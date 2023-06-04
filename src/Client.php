<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot;

use Werty\Http\Clients\TelegramBot\Exception as TelegramBotException;
use Werty\Http\Clients\TelegramBot\Model\File;
use Werty\Http\Clients\TelegramBot\Model\ChatMember;
use Werty\Http\Clients\TelegramBot\Model\InputMedia;
use Werty\Http\Json\Exception;
use Werty\Mapping\EmptyObject;

class Client extends \Werty\Http\Json\Client
{
    private string $url;
    private string $fileUrl;
    private string $baseUrl;

    public function __construct($token)
    {
        $this->baseUrl = "https://api.telegram.org";
        $this->url = "$this->baseUrl/bot$token";
        $this->fileUrl = "$this->baseUrl/file/bot$token";
        parent::__construct();
    }

    public function getFile($fileId): File
    {
        $response = $this->get("$this->url/getFile", ['file_id' => $fileId]);
        return new File($response->result);
    }

    public function downloadFile(File $file)
    {
        $path = $file->getFilePath();
        return file_get_contents("$this->fileUrl/{$path}");
    }

    public function sendMessage($chatId, $text, $replyTo = null, $replyMarkup = null)
    {
        $data = [
            'text' => $text,
            'chat_id' => $chatId,
            'parse_mode' => 'MarkdownV2',
        ];
        if ($replyTo) {
            $data['reply_to_message_id'] = $replyTo;
        }
        if ($replyMarkup) {
            $data['reply_markup'] = $replyMarkup;
        }
        return $this->post("$this->url/sendMessage", [], $data);
    }

    public function deleteMessage($chatId, $messageId)
    {
        $data = [
            'message_id' => $messageId,
            'chat_id' => $chatId
        ];
        return $this->post("$this->url/deleteMessage", [], $data);
    }

    public function leaveChat($chatId)
    {
        $data = [
            'chat_id' => $chatId
        ];
        return $this->post("$this->url/leaveChat", [], $data);
    }

    public function getWebhookInfo()
    {
        return $this->get("$this->url/getWebhookInfo");
    }

    public function setWebhook(string $url)
    {
        return $this->post("$this->url/setWebhook", ['url' => $url]);
    }

    public function deleteWebhook($dropPendingUpdates = true)
    {
        return $this->post("$this->url/deleteWebhook", ['drop_pending_updates' => $dropPendingUpdates]);
    }

    public function sendVideo($chatId, $file, $caption = null, $replyTo = null, $mimeType = 'image/gif')
    {
        $file = new \CURLFile($file, $mimeType, basename($file));

        $data = [
            'video' => $file,
            'chat_id' => $chatId,
        ];

        if ($replyTo) {
            $data['reply_to_message_id'] = $replyTo;
        }

        if ($caption) {
            $data['caption'] = $caption;
        }

        $url = "$this->url/sendVideo";
        return $this->directPost($url, $data);
    }

    public function sendAnimation($chatId, $file, $caption = null, $replyTo = null, $mimeType = 'image/gif', $width = null, $height = null)
    {
        $file = new \CURLFile($file, $mimeType, basename($file));

        $data = [
            'animation' => $file,
            'chat_id' => $chatId,
        ];

        if ($width) {
            $data['width'] = $width;
        }

        if ($height) {
            $data['height'] = $height;
        }

        if ($replyTo) {
            $data['reply_to_message_id'] = $replyTo;
        }

        if ($caption) {
            $data['caption'] = $caption;
        }

        $url = "$this->url/sendAnimation";
        return $this->directPost($url, $data);
    }


    public function sendVoice($chatId, $file, $caption = null, $replyTo = null)
    {
        $file = new \CURLFile($file, "audio/ogg", basename($file));

        $data = [
            'voice' => $file,
            'chat_id' => $chatId,
            'disable_notification' => true,
        ];

        if ($replyTo) {
            $data['reply_to_message_id'] = $replyTo;
        }

        if ($caption) {
            $data['caption'] = $caption;
        }

        $url = "$this->url/sendVoice";
        return $this->directPost($url, $data);
    }


    private function isUrl($uri): bool
    {
        $scheme = parse_url($uri, PHP_URL_SCHEME);
        if (!in_array($scheme, ['http', 'https', 'ftp'])) {
            return false;
        }
        return true;
    }

    /**
     * @param $chatId
     * @param InputMedia[] $media
     * @param $replyTo
     * @return void
     * @throws Exception
     */

    public function sendMediaGroup($chatId, array $media, $replyTo = null) {
        $url = "$this->url/sendMediaGroup";
        $data = [
            'chat_id' => $chatId,
        ];

        // replace local filesystem links with curl files
        foreach ($media as $k => $medium)
        {
            $file = $medium->media;
            if ($this->isUrl($file)) {
                continue;
            }
            if (!file_exists($file)) {
                throw new \Exception("File $medium->media doesn't exist");
            }

            $fileKey = "item$k";
            $medium->media = "attach://$fileKey";
            $mimeType = mime_content_type($file);
            $data[$fileKey] = new \CURLFile($file, $mimeType, basename($file));
        }

        $mediaArray = [];

        foreach ($media as $medium) {
            $mediaArray[] = $medium->toCleanArray();
        }

        $data['media'] = json_encode($mediaArray);
        if ($replyTo) {
            $data['reply_to_message_id'] = $replyTo;
        }
        return $this->directPost($url, $data);
    }

    public function sendPhoto($chatId, $photo, $caption = null, $replyTo = null, $replyMarkup = null)
    {
        $url = "$this->url/sendPhoto";

        if (!$this->isUrl($photo)) {
            if (!file_exists($photo)) {
                throw new \Exception("File $photo doesn't exist");
            }
            $photo = new \CURLFile($photo, "image/png", basename($photo));
        }

        $data = [
            'photo' => $photo,
            'chat_id' => $chatId,
        ];
        if ($replyTo) {
            $data['reply_to_message_id'] = $replyTo;
        }
        if ($caption) {
            $data['caption'] = $caption;
        }
        if ($replyMarkup) {
            $data['reply_markup'] = $replyMarkup;
        }
        return $this->directPost($url, $data);
    }

    protected function directPost(string $url, array $data)
    {
        $ch = curl_init();
        $opts = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
        ];
        curl_setopt_array($ch, $opts);
        $result = curl_exec($ch);
        $errno = curl_errno($ch);

        if ($errno) {
            $message = curl_error($ch);
            throw new Exception($message, $errno, var_export($opts, true), $result);
        }

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code >= 300) {
            $message = "Server responded with unexpected code: {$code}";
            throw new Exception($message, $code, var_export($opts, true), $result);
        }
        return $this->decode($result);
    }

    public function getChatMember($chatId, $userId): ChatMember
    {
        $data = [
            'user_id' => $userId,
            'chat_id' => $chatId
        ];
        $response = $this->get("$this->url/getChatMember", $data);
        if ($response->ok === true) {
            return new ChatMember($response->result);
        }
        throw new TelegramBotException($response);
    }

    public function answerCallbackQuery($callbackQueryId, $text = null)
    {
        $data = [
            'callback_query_id' => $callbackQueryId,
        ];
        if ($text) {
            $data['text'] = $text;
        }
        return $this->post("$this->url/answerCallbackQuery", $data);
    }

    public function editMessage($chatId, $messageId, $text, $replyMarkup = null)
    {
        $data = [
            'text' => $text,
            'chat_id' => $chatId,
            'parse_mode' => 'MarkdownV2',
            'message_id' => $messageId,
        ];
        if ($replyMarkup) {
            $data['reply_markup'] = $replyMarkup;
        }
        return $this->post("$this->url/editMessage", [], $data);
    }

    public function editMessagePhoto($chatId, $messageId, $file, $replyMarkup = null)
    {
        $file = new \CURLFile($file, "image/png", basename($file));
        $media = [
            'type' => 'photo',
            'media' => 'attach://photo',
        ];
        $data = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'media' => json_encode($media),
            'photo' => $file,
        ];
        if ($replyMarkup) {
            $data['reply_markup'] = $replyMarkup;
        }
        $url = "$this->url/editMessageMedia";
        return $this->directPost($url, $data);
    }
}
