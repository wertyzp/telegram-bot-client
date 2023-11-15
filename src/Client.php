<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot;

use http\Env\Request;
use Werty\Http\Clients\TelegramBot\Exceptions\HttpException;
use Werty\Http\Clients\TelegramBot\Exceptions\TelegramBotException;
use Werty\Http\Clients\TelegramBot\Requests\AnswerCallbackQuery;
use Werty\Http\Clients\TelegramBot\Requests\Chat;
use Werty\Http\Clients\TelegramBot\Requests\ChatMember;
use Werty\Http\Clients\TelegramBot\Requests\File;
use Werty\Http\Clients\TelegramBot\Requests\ForwardMessage;
use Werty\Http\Clients\TelegramBot\Requests\InputMedia;
use Werty\Http\Clients\TelegramBot\Requests\Response;
use Werty\Http\Clients\TelegramBot\Requests\SendMediaGroup;
use Werty\Http\Clients\TelegramBot\Requests\SendPhoto;
use Werty\Http\Clients\TelegramBot\Requests\SendVideo;
use Werty\Http\Clients\TelegramBot\Requests\TelegramObject;
use Werty\Http\Clients\TelegramBot\Types\Message;
use Werty\Http\Clients\TelegramBot\Types\User;
use Werty\Http\Clients\TelegramBot\Types\UserProfilePhotos;
use Werty\Http\Json\Exception;

class Client
{
    private string $url;
    private string $fileUrl;
    private string $baseUrl;

    public function __construct($token)
    {
        $this->baseUrl = "https://api.telegram.org";
        $this->url = "$this->baseUrl/bot$token";
        $this->fileUrl = "$this->baseUrl/file/bot$token";
    }

    public function getMe(): Types\User
    {
        return $this->send("getMe", [], Types\User::class);
    }

    public function downloadFile(File $file)
    {
        $path = $file->getFilePath();
        return file_get_contents("$this->fileUrl/{$path}");
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

    /**
     *
     * Use this method to send audio files, if you want Telegram clients to display them
     * in the music player. Your audio must be in the .MP3 or .M4A format.
     * On success, the sent Message is returned.
     * Bots can currently send audio files of up to 50 MB in size, this limit may be changed in
     * the future.
     * @param SendAudio $audio
     * @return Message
     * @throws Exception
     * @throws HttpException
     */

    public function sendAudio(Requests\SendAudio $audio): Message
    {
        return $this->send('sendAudio', $audio->toArray(), Message::class);
    }

    public function sendVideo(SendVideo $video): Message
    {
        return $this->send('sendVideo', $video->toArray(), Message::class);
    }

    public function sendVideoNote(Requests\SendVideoNote $videoNote): Message
    {
        return $this->send('sendVideoNote', $videoNote->toArray(), Message::class);
    }

    public function sendDice(Requests\SendDice $dice): Message
    {
        return $this->send('sendDice', $dice->toArray(), Message::class);
    }

    public function sendChatAction(Requests\SendChatAction $chatAction): bool
    {
        return $this->send('sendChatAction', $chatAction->toArray(), ModelBase::T_BOOLEAN);
    }

    /**
     * @param Requests\GetUserProfilePhotos $userProfilePhotos
     * @return UserProfilePhotos
     * @throws Exception
     * @throws HttpException
     */
    public function getUserProfilePhotos(Requests\GetUserProfilePhotos $userProfilePhotos): UserProfilePhotos
    {
        return $this->send('getUserProfilePhotos', $userProfilePhotos->toArray(), UserProfilePhotos::class);
    }

    public function getFile(Requests\GetFile $file): File
    {
        return $this->send('getFile', $file->toArray(), File::class);
    }

    public function banChatMember(Requests\BanChatMember $banChatMember): bool
    {
        return $this->send('banChatMember', $banChatMember->toArray(), ModelBase::T_BOOLEAN);
    }

    public function unbanChatMember(Requests\UnbanChatMember $unbanChatMember): bool
    {
        return $this->send('unbanChatMember', $unbanChatMember->toArray(), ModelBase::T_BOOLEAN);
    }

    public function restrictChatMember(Requests\RestrictChatMember $restrictChatMember): bool
    {
        return $this->send('restrictChatMember', $restrictChatMember->toArray(), ModelBase::T_BOOLEAN);
    }

    public function promoteChatMember(Requests\PromoteChatMember $promoteChatMember): bool
    {
        return $this->send('promoteChatMember', $promoteChatMember->toArray(), ModelBase::T_BOOLEAN);
    }

    public function banChatSenderChat(Requests\BanChatSenderChat $banChatSenderChat): bool
    {
        return $this->send('banChatSenderChat', $banChatSenderChat->toArray(), ModelBase::T_BOOLEAN);
    }

    public function setChatAdministratorCustomTitle(Requests\SetChatAdministratorCustomTitle $setChatAdministratorCustomTitle): bool
    {
        return $this->send('setChatAdministratorCustomTitle', $setChatAdministratorCustomTitle->toArray(), ModelBase::T_BOOLEAN);
    }

    public function sendDocument(Requests\SendDocument $document): Message
    {
        return $this->send('sendDocument', $document->toArray(), Message::class);
    }

    public function sendAnimation(Requests\SendAnimation $animation): Message
    {
        return $this->send('sendAnimation', $animation->toArray(), Message::class);
    }

    public function sendVoice(Requests\SendVoice $voice): Message
    {
        return $this->send('sendVoice', $voice->toArray(), Message::class);
    }


    private function isUrl($uri): bool
    {
        $scheme = parse_url($uri, PHP_URL_SCHEME);
        if (!in_array($scheme, ['http', 'https', 'ftp', 'attach'])) {
            return false;
        }
        return true;
    }

    /**
     * @param $chatId
     * @param InputMedia[] $media
     * @param $replyTo
     * @return Message[]
     * @throws HttpException|Exception
     */

    public function sendMediaGroup(SendMediaGroup $mediaGroup): array
    {
        $data = [];


        print_r($mediaGroup);
        foreach ($mediaGroup->getMedia() as $k => $medium)
        {
            print_r($medium);
            $file = $medium->getMedia();

            if ($this->isUrl($file)) {
                continue;
            }

            if (!file_exists($file)) {
                throw new \Exception("File {$medium->getMedia()} doesn't exist");
            }

            $fileKey = "item$k";
            $medium->setMedia("attach://$fileKey");
            $mimeType = mime_content_type($file);
            $data[$fileKey] = new \CURLFile($file, $mimeType, basename($file));
        }

        $data = array_merge($data, $mediaGroup->toArray());
        $data['media'] = json_encode($data['media']);
        return $this->send('sendMediaGroup', $data, [Message::class]);
    }

    public function sendVenue(Requests\SendVenue $venue): Message
    {
        return $this->send('sendVenue', $venue->toArray(), Message::class);
    }

    public function sendContact(Requests\SendContact $contact): Message
    {
        return $this->send('sendContact', $contact->toArray(), Message::class);
    }

    public function sendPoll(Requests\SendPoll $poll): Message
    {
        return $this->send('sendPoll', $poll->toArray(), Message::class);
    }
    /**
     * @param string $url
     * @param array $data
     * @return Response
     * @throws Exception
     */
    protected function post(string $url, array $data): Response
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

        try {
            $decoded = json_decode($result, false, 512, JSON_THROW_ON_ERROR);
            return new Response($decoded);
        } catch (\JsonException $e) {
            $message = "Server responded with unexpected code: {$code}";
            throw new HttpException($message, $code, $data, $result ?: '');
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

    public function getChat(int|string $chatId): Chat
    {
        return $this->send('getChat', ['chat_id' => $chatId], Requests\Chat::class);
    }

    public function answerCallbackQuery(AnswerCallbackQuery $query): bool
    {
        $data = $query->toArray();
        $this->send("answerCallbackQuery", $data);
    }

    public function editMessageText(Requests\EditMessageText $message): Message
    {
        return $this->send('editMessageText', $message->toArray(), Message::class);
    }

    public function sendMessage(Requests\SendMessage $message): Types\Message {
        return $this->send('sendMessage', $message->toArray(), Types\Message::class);
    }

    public function forwardMessage(ForwardMessage $forwardMessage): Types\Message {
        return $this->send('forwardMessage', $forwardMessage->toArray(), Types\Message::class);
    }

    public function copyMessage(CopyMessage $copyMessage): Types\Message {
        return $this->send('copyMessage', $copyMessage->toArray(), Types\Message::class);
    }

    public function sendPhoto(SendPhoto $message): Types\Message {
        return $this->send('sendPhoto', $message->toArray(), Types\Message::class);
    }

    /**
     * @param string $path
     * @param array $data
     * @param mixed $responseType
     * @return mixed
     * @throws Exception
     * @throws HttpException
     */
    protected function send(string $path, array $data, mixed $responseType): mixed
    {
        $url = "$this->url/$path";
        $response = $this->post($url, $data);

       if ($response->isOk() === true) {
            return ModelBase::mapType($responseType, $response->getResult());
        } else {
            throw new HttpException($response->getDescription(), $response->getErrorCode(), $data, $response);
        }
    }
}
