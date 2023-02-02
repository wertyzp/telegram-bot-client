<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot;

use Werty\Http\Clients\TelegramBot\Exception as TelegramBotException;
use Werty\Http\Clients\TelegramBot\Model\File;
use Werty\Http\Clients\TelegramBot\Model\ChatMember;
use Werty\Http\Json\Exception;

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

    public function sendMessage($chatId, $text, $replyTo = null)
    {
        $data = [
            'text' => $text,
            'chat_id' => $chatId,
            'parse_mode' => 'MarkdownV2',
        ];
        if ($replyTo) {
            $data['reply_to_message_id'] = $replyTo;
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

        $url = "$this->url/sendAnimation";
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
    }

    public function sendPhoto($chatId, $file, $caption = null, $replyTo = null, $replyMarkup = null)
    {
        $url = "$this->url/sendPhoto";

        $file = new \CURLFile($file, "image/png", basename($file));
        $data = [
            'photo' => $file,
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
}
