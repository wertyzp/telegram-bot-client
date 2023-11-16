<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot;

use Werty\Http\Clients\TelegramBot\Exceptions\HttpException;
use Werty\Http\Clients\TelegramBot\Requests\AnswerCallbackQuery;
use Werty\Http\Clients\TelegramBot\Requests\Chat;
use Werty\Http\Clients\TelegramBot\Requests\ChatMember;
use Werty\Http\Clients\TelegramBot\Requests\File;
use Werty\Http\Clients\TelegramBot\Requests\ForwardMessage;
use Werty\Http\Clients\TelegramBot\Requests\InputMedia;
use Werty\Http\Clients\TelegramBot\Requests\LeaveChat;
use Werty\Http\Clients\TelegramBot\Requests\Request;
use Werty\Http\Clients\TelegramBot\Requests\SendAudio;
use Werty\Http\Clients\TelegramBot\Requests\SendMediaGroup;
use Werty\Http\Clients\TelegramBot\Requests\SendPhoto;
use Werty\Http\Clients\TelegramBot\Requests\SendVideo;
use Werty\Http\Clients\TelegramBot\Requests\SetWebhook;
use Werty\Http\Clients\TelegramBot\Types\BotDescription;
use Werty\Http\Clients\TelegramBot\Types\Message;
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

    public function downloadFile(Types\File $file): string|false
    {
        $path = $file->getFilePath();
        return file_get_contents("$this->fileUrl/{$path}");
    }

    public function leaveChat(LeaveChat $leaveChat): bool
    {
        return $this->send('leaveChat', $leaveChat->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function getWebhookInfo(): Types\WebhookInfo
    {
        return $this->send("getWebhookInfo", [], Types\WebhookInfo::class);
    }

    public function setWebhook(SetWebhook $request): bool
    {
        return $this->send("setWebhook", $request->toPostData(), ModelBase::T_BOOLEAN);
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
        return $this->send('sendAudio', $audio->toPostData(), Message::class);
    }

    public function sendVideo(Requests\SendVideo $video): Message
    {
        return $this->send('sendVideo', $video->toPostData(), Message::class);
    }

    public function getChat(Requests\GetChat $request): Types\Chat
    {
        return $this->send('getChat', $request->toPostData(), Types\Chat::class);
    }

    public function getChatMember(Requests\GetChatMember $request): Types\ChatMember
    {
        return $this->send('getChatMember', $request->toPostData(), Types\ChatMember::class);
    }

    public function sendVideoNote(Requests\SendVideoNote $videoNote): Message
    {
        return $this->send('sendVideoNote', $videoNote->toPostData(), Message::class);
    }

    public function sendDice(Requests\SendDice $dice): Message
    {
        return $this->send('sendDice', $dice->toPostData(), Message::class);
    }

    public function sendChatAction(Requests\SendChatAction $chatAction): bool
    {
        return $this->send('sendChatAction', $chatAction->toPostData(), ModelBase::T_BOOLEAN);
    }

    /**
     * @param Requests\GetUserProfilePhotos $userProfilePhotos
     * @return UserProfilePhotos
     * @throws Exception
     * @throws HttpException
     */
    public function getUserProfilePhotos(Requests\GetUserProfilePhotos $userProfilePhotos): UserProfilePhotos
    {
        return $this->send('getUserProfilePhotos', $userProfilePhotos->toPostData(), UserProfilePhotos::class);
    }

    public function getFile(Requests\GetFile $file): File
    {
        return $this->send('getFile', $file->toPostData(), File::class);
    }

    public function banChatMember(Requests\BanChatMember $banChatMember): bool
    {
        return $this->send('banChatMember', $banChatMember->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function unbanChatMember(Requests\UnbanChatMember $unbanChatMember): bool
    {
        return $this->send('unbanChatMember', $unbanChatMember->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function restrictChatMember(Requests\RestrictChatMember $restrictChatMember): bool
    {
        return $this->send('restrictChatMember', $restrictChatMember->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function promoteChatMember(Requests\PromoteChatMember $promoteChatMember): bool
    {
        return $this->send('promoteChatMember', $promoteChatMember->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function banChatSenderChat(Requests\BanChatSenderChat $banChatSenderChat): bool
    {
        return $this->send('banChatSenderChat', $banChatSenderChat->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function setChatAdministratorCustomTitle(Requests\SetChatAdministratorCustomTitle $setChatAdministratorCustomTitle): bool
    {
        return $this->send('setChatAdministratorCustomTitle', $setChatAdministratorCustomTitle->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function sendDocument(Requests\SendDocument $document): Message
    {
        return $this->send('sendDocument', $document->toPostData(), Message::class);
    }

    public function sendAnimation(Requests\SendAnimation $animation): Message
    {
        return $this->send('sendAnimation', $animation->toPostData(), Message::class);
    }

    public function sendVoice(Requests\SendVoice $voice): Message
    {
        return $this->send('sendVoice', $voice->toPostData(), Message::class);
    }

    public function sendMediaGroup(Requests\SendMediaGroup $mediaGroup): array
    {
        return $this->send('sendMediaGroup', $mediaGroup->toPostData(), [Message::class]);
    }

    public function sendVenue(Requests\SendVenue $venue): Message
    {
        return $this->send('sendVenue', $venue->toPostData(), Message::class);
    }

    public function sendContact(Requests\SendContact $contact): Message
    {
        return $this->send('sendContact', $contact->toPostData(), Message::class);
    }

    public function sendPoll(Requests\SendPoll $poll): Message
    {
        return $this->send('sendPoll', $poll->toPostData(), Message::class);
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

    public function answerCallbackQuery(AnswerCallbackQuery $request): bool
    {
        return $this->send("answerCallbackQuery", $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function editMessageText(Requests\EditMessageText $message): Message
    {
        return $this->send('editMessageText', $message->toPostData(), Message::class);
    }

    public function sendMessage(Requests\SendMessage $message): Types\Message
    {
        return $this->send('sendMessage', $message->toPostData(), Types\Message::class);
    }

    public function forwardMessage(ForwardMessage $forwardMessage): Types\Message
    {
        return $this->send('forwardMessage', $forwardMessage->toPostData(), Types\Message::class);
    }

    public function copyMessage(Requests\CopyMessage $copyMessage): Types\Message
    {
        return $this->send('copyMessage', $copyMessage->toPostData(), Types\Message::class);
    }

    public function sendPhoto(SendPhoto $message): Types\Message
    {
        return $this->send('sendPhoto', $message->toPostData(), Types\Message::class);
    }

    public function logOut(Requests\LogOut $request): bool
    {
        return $this->send('logOut', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function close(Requests\Close $request): bool
    {
        return $this->send('close', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function sendLocation(Requests\SendLocation $request): Message
    {
        return $this->send('sendLocation', $request->toPostData(), Types\Message::class);
    }

    public function unbanChatSenderChat(Requests\UnbanChatSenderChat $request): bool
    {
        return $this->send('unbanChatSenderChat', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function setChatPermissions(Requests\SetChatPermissions $request): bool
    {
        return $this->send('setChatPermissions', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function exportChatInviteLink(Requests\ExportChatInviteLink $request): string
    {
        return $this->send('exportChatInviteLink', $request->toPostData(), ModelBase::T_STRING);
    }

    public function createChatInviteLink(Requests\CreateChatInviteLink $request): Types\ChatInviteLink
    {
        return $this->send('createChatInviteLink', $request->toPostData(), Types\ChatInviteLink::class);
    }

    public function editChatInviteLink(Requests\EditChatInviteLink $request): Types\ChatInviteLink
    {
        return $this->send('editChatInviteLink', $request->toPostData(), Types\ChatInviteLink::class);
    }

    public function revokeChatInviteLink(Requests\RevokeChatInviteLink $request): Types\ChatInviteLink
    {
        return $this->send('revokeChatInviteLink', $request->toPostData(), Types\ChatInviteLink::class);
    }

    public function approveChatJoinRequest(Requests\ApproveChatJoinRequest $request): bool
    {
        return $this->send('approveChatJoinRequest', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function declineChatJoinRequest(Requests\DeclineChatJoinRequest $request): bool
    {
        return $this->send('declineChatJoinRequest', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function setChatPhoto(Requests\SetChatPhoto $request): bool
    {
        return $this->send('setChatPhoto', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function deleteChatPhoto(Requests\DeleteChatPhoto $request): bool
    {
        return $this->send('deleteChatPhoto', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function setChatTitle(Requests\SetChatTitle $request): bool
    {
        return $this->send('setChatTitle', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function setChatDescription(Requests\SetChatDescription $request): bool
    {
        return $this->send('setChatDescription', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function pinChatMessage(Requests\PinChatMessage $request): bool
    {
        return $this->send('pinChatMessage', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function unpinChatMessage(Requests\UnpinChatMessage $request): bool
    {
        return $this->send('unpinChatMessage', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function unpinAllChatMessages(Requests\UnpinAllChatMessages $request): bool
    {
        return $this->send('unpinAllChatMessages', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function getChatAdministrators(Requests\GetChatAdministrators $request): Types\ChatMember
    {
        return $this->send('getChatAdministrators', $request->toPostData(), Types\ChatMember::class);
    }

    public function getChatMemberCount(Requests\GetChatMemberCount $request): int
    {
        return $this->send('getChatMemberCount', $request->toPostData(), ModelBase::T_INTEGER);
    }

    public function setChatStickerSet(Requests\SetChatStickerSet $request): bool
    {
        return $this->send('setChatStickerSet', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function deleteChatStickerSet(Requests\DeleteChatStickerSet $request): bool
    {
        return $this->send('deleteChatStickerSet', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function getForumTopicIconStickers(Requests\GetForumTopicIconStickers $request): Types\Sticker
    {
        return $this->send('getForumTopicIconStickers', $request->toPostData(), Types\Sticker::class);
    }

    public function createForumTopic(Requests\CreateForumTopic $request): Types\ForumTopic
    {
        return $this->send('createForumTopic', $request->toPostData(), Types\ForumTopic::class);
    }

    public function editForumTopic(Requests\EditForumTopic $request): bool
    {
        return $this->send('editForumTopic', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function closeForumTopic(Requests\CloseForumTopic $request): bool
    {
        return $this->send('closeForumTopic', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function reopenForumTopic(Requests\ReopenForumTopic $request): bool
    {
        return $this->send('reopenForumTopic', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function deleteForumTopic(Requests\DeleteForumTopic $request): bool
    {
        return $this->send('deleteForumTopic', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function unpinAllForumTopicMessages(Requests\UnpinAllForumTopicMessages $request): bool
    {
        return $this->send('unpinAllForumTopicMessages', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function editGeneralForumTopic(Requests\EditGeneralForumTopic $request): bool
    {
        return $this->send('editGeneralForumTopic', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function closeGeneralForumTopic(Requests\CloseGeneralForumTopic $request): bool
    {
        return $this->send('closeGeneralForumTopic', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function reopenGeneralForumTopic(Requests\ReopenGeneralForumTopic $request): bool
    {
        return $this->send('reopenGeneralForumTopic', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function hideGeneralForumTopic(Requests\HideGeneralForumTopic $request): bool
    {
        return $this->send('hideGeneralForumTopic', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function unhideGeneralForumTopic(Requests\UnhideGeneralForumTopic $request): bool
    {
        return $this->send('unhideGeneralForumTopic', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function unpinAllGeneralForumTopicMessages(Requests\UnpinAllGeneralForumTopicMessages $request): bool
    {
        return $this->send('unpinAllGeneralForumTopicMessages', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function setMyCommands(Requests\SetMyCommands $request): bool
    {
        return $this->send('setMyCommands', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function deleteMyCommands(Requests\DeleteMyCommands $request): bool
    {
        return $this->send('deleteMyCommands', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function getMyCommands(Requests\GetMyCommands $request): array
    {
        return $this->send('getMyCommands', $request->toPostData(), [Types\BotCommand::class]);
    }

    public function setMyName(Requests\SetMyName $request): bool
    {
        return $this->send('setMyName', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function getMyName(Requests\GetMyName $request): Types\BotName
    {
        return $this->send('getMyName', $request->toPostData(), Types\BotName::class);
    }

    public function setMyDescription(Requests\SetMyDescription $request): bool
    {
        return $this->send('setMyDescription', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function getMyDescription(Requests\GetMyDescription $request): BotDescription
    {
        return $this->send('getMyDescription', $request->toPostData(), BotDescription::class);
    }

    public function setMyShortDescription(Requests\SetMyShortDescription $request): bool
    {
        return $this->send('setMyShortDescription', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function getMyShortDescription(Requests\GetMyShortDescription $request): Types\BotShortDescription
    {
        return $this->send('getMyShortDescription', $request->toPostData(), Types\BotShortDescription::class);
    }

    public function setChatMenuButton(Requests\SetChatMenuButton $request): bool
    {
        return $this->send('setChatMenuButton', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function getChatMenuButton(Requests\GetChatMenuButton $request): Types\MenuButton
    {
        return $this->send('getChatMenuButton', $request->toPostData(), Types\MenuButton::class);
    }

    public function setMyDefaultAdministratorRights(Requests\SetMyDefaultAdministratorRights $request): bool
    {
        return $this->send('setMyDefaultAdministratorRights', $request->toPostData(), ModelBase::T_BOOLEAN);
    }

    public function getMyDefaultAdministratorRights(Requests\GetMyDefaultAdministratorRights $request): Types\ChatAdministratorRights
    {
        return $this->send('getMyDefaultAdministratorRights', $request->toPostData(), Types\ChatAdministratorRights::class);
    }
    /**
     * @param string $path
     * @param array $data
     * @param mixed $responseType
     * @return mixed
     * @throws Exception
     * @throws HttpException
     */
    protected function send(string $path, array $data = [], mixed $responseType = null): mixed
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
