<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
message_id	Integer	Unique message identifier inside this chat
message_thread_id	Integer	Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
from	User	Optional. Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
sender_chat	Chat	Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the supergroup itself for messages from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group. For backward compatibility, the field from contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
date	Integer	Date the message was sent in Unix time
chat	Chat	Conversation the message belongs to
forward_origin 	MessageOrigin 	Optional. Information about the original message for forwarded messages
is_topic_message	True	Optional. True, if the message is sent to a forum topic
is_automatic_forward	True	Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
reply_to_message	Message	Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
via_bot	User	Optional. Bot through which the message was sent
edit_date	Integer	Optional. Date the message was last edited in Unix time
has_protected_content	True	Optional. True, if the message can't be forwarded
media_group_id	String	Optional. The unique identifier of a media message group this message belongs to
author_signature	String	Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
text	String	Optional. For text messages, the actual UTF-8 text of the message
entities	Array of MessageEntity	Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
animation	Animation	Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
audio	Audio	Optional. Message is an audio file, information about the file
document	Document	Optional. Message is a general file, information about the file
photo	Array of PhotoSize	Optional. Message is a photo, available sizes of the photo
sticker	Sticker	Optional. Message is a sticker, information about the sticker
story	Story	Optional. Message is a forwarded story
video	Video	Optional. Message is a video, information about the video
video_note	VideoNote	Optional. Message is a video note, information about the video message
voice	Voice	Optional. Message is a voice message, information about the file
caption	String	Optional. Caption for the animation, audio, document, photo, video or voice
caption_entities	Array of MessageEntity	Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
has_media_spoiler	True	Optional. True, if the message media is covered by a spoiler animation
contact	Contact	Optional. Message is a shared contact, information about the contact
dice	Dice	Optional. Message is a dice with random value
game	Game	Optional. Message is a game, information about the game. More about games »
poll	Poll	Optional. Message is a native poll, information about the poll
venue	Venue	Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
location	Location	Optional. Message is a shared location, information about the location
new_chat_members	Array of User	Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
left_chat_member	User	Optional. A member was removed from the group, information about them (this member may be the bot itself)
new_chat_title	String	Optional. A chat title was changed to this value
new_chat_photo	Array of PhotoSize	Optional. A chat photo was change to this value
delete_chat_photo	True	Optional. Service message: the chat photo was deleted
group_chat_created	True	Optional. Service message: the group has been created
supergroup_chat_created	True	Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
channel_chat_created	True	Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
message_auto_delete_timer_changed	MessageAutoDeleteTimerChanged	Optional. Service message: auto-delete timer settings changed in the chat
migrate_to_chat_id	Integer	Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
migrate_from_chat_id	Integer	Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
pinned_message	Message	Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
invoice	Invoice	Optional. Message is an invoice for a payment, information about the invoice. More about payments »
successful_payment	SuccessfulPayment	Optional. Message is a service message about a successful payment, information about the payment. More about payments »
user_shared	UserShared	Optional. Service message: a user was shared with the bot
chat_shared	ChatShared	Optional. Service message: a chat was shared with the bot
connected_website	String	Optional. The domain name of the website on which the user has logged in. More about Telegram Login »
write_access_allowed	WriteAccessAllowed	Optional. Service message: the user allowed the bot to write messages after adding it to the attachment or side menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess
passport_data	PassportData	Optional. Telegram Passport data
proximity_alert_triggered	ProximityAlertTriggered	Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
forum_topic_created	ForumTopicCreated	Optional. Service message: forum topic created
forum_topic_edited	ForumTopicEdited	Optional. Service message: forum topic edited
forum_topic_closed	ForumTopicClosed	Optional. Service message: forum topic closed
forum_topic_reopened	ForumTopicReopened	Optional. Service message: forum topic reopened
general_forum_topic_hidden	GeneralForumTopicHidden	Optional. Service message: the 'General' forum topic hidden
general_forum_topic_unhidden	GeneralForumTopicUnhidden	Optional. Service message: the 'General' forum topic unhidden
video_chat_scheduled	VideoChatScheduled	Optional. Service message: video chat scheduled
video_chat_started	VideoChatStarted	Optional. Service message: video chat started
video_chat_ended	VideoChatEnded	Optional. Service message: video chat ended
video_chat_participants_invited	VideoChatParticipantsInvited	Optional. Service message: new participants invited to a video chat
web_app_data	WebAppData	Optional. Service message: data sent by a Web App
reply_markup	InlineKeyboardMarkup	Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
 */
class Message extends Type
{
    protected const TYPE_MAP = [
        'from' => User::class,
        'chat' => Chat::class,
        'forward_origin' => MessageOrigin::class,
        'reply_to_message' => self::class,
        'via_bot' => User::class,
        'entities' => [MessageEntity::class],
        'caption_entities' => [MessageEntity::class],
        'audio' => Audio::class,
        'document' => Document::class,
        'animation' => Animation::class,
        'game' => Game::class,
        'photo' => [PhotoSize::class],
        'sticker' => Sticker::class,
        'video' => Video::class,
        'voice' => Voice::class,
        'video_note' => VideoNote::class,
        'contact' => Contact::class,
        'location' => Location::class,
        'venue' => Venue::class,
        'poll' => Poll::class,
        'dice' => Dice::class,
        'new_chat_members' => [User::class],
        'left_chat_member' => User::class,
        'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
        'pinned_message' => self::class,
        'invoice' => Invoice::class,
        'successful_payment' => SuccessfulPayment::class,
        'passport_data' => PassportData::class,
        'proximity_alert_triggered' => ProximityAlertTriggered::class,
        'forum_topic_created' => ForumTopicCreated::class,
        'forum_topic_edited' => ForumTopicEdited::class,
        'forum_topic_closed' => ForumTopicClosed::class,
        'forum_topic_reopened' => ForumTopicReopened::class,
        'general_forum_topic_hidden' => GeneralForumTopicHidden::class,
        'general_forum_topic_unhidden' => GeneralForumTopicUnhidden::class,
        'video_chat_scheduled' => VideoChatScheduled::class,
        'video_chat_started' => VideoChatStarted::class,
        'video_chat_ended' => VideoChatEnded::class,
        'video_chat_participants_invited' => VideoChatParticipantsInvited::class,
        'web_app_data' => WebAppData::class,
        'reply_markup' => InlineKeyboardMarkup::class,

    ];

    protected int $message_id;
    protected ?User $from = null;
    protected int $date;
    protected ?Chat $chat = null;
    protected MessageOrigin|MessageOriginChat|MessageOriginChannel|MessageOriginUser|MessageOriginHiddenUser|null $forward_origin = null;
    protected ?Message $reply_to_message = null;
    protected ?User $via_bot = null;
    protected ?int $edit_date = null;
    protected ?string $media_group_id = null;
    protected ?string $author_signature = null;
    protected ?string $text = null;
    protected ?array $entities = null;
    protected ?array $caption_entities = null;
    protected ?Audio $audio = null;
    protected ?Document $document = null;
    protected ?Animation $animation = null;
    protected ?Game $game = null;
    protected ?array $photo = null;
    protected ?Sticker $sticker = null;
    protected ?Video $video = null;
    protected ?Voice $voice = null;
    protected ?VideoNote $video_note = null;
    protected ?string $caption = null;
    protected ?Contact $contact = null;
    protected ?Location $location = null;
    protected ?Venue $venue = null;
    protected ?Poll $poll = null;
    protected ?Dice $dice = null;
    protected ?User $new_chat_member = null;
    protected ?User $left_chat_member = null;
    protected ?string $new_chat_title = null;
    protected ?array $new_chat_photo = null;
    protected ?bool $delete_chat_photo = null;
    protected ?bool $group_chat_created = null;
    protected ?bool $supergroup_chat_created = null;
    protected ?bool $channel_chat_created = null;
    protected ?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed = null;
    protected ?int $migrate_to_chat_id = null;
    protected ?int $migrate_from_chat_id = null;
    protected ?Message $pinned_message = null;
    protected ?Invoice $invoice = null;
    protected ?SuccessfulPayment $successful_payment = null;
    protected ?User $user_shared = null;
    protected ?Chat $chat_shared = null;
    protected ?string $connected_website = null;
    protected ?WriteAccessAllowed $write_access_allowed = null;
    protected ?PassportData $passport_data = null;
    protected ?ProximityAlertTriggered $proximity_alert_triggered = null;
    protected ?ForumTopicCreated $forum_topic_created = null;
    protected ?ForumTopicEdited $forum_topic_edited = null;
    protected ?ForumTopicClosed $forum_topic_closed = null;
    protected ?ForumTopicReopened $forum_topic_reopened = null;
    protected ?GeneralForumTopicHidden $general_forum_topic_hidden = null;
    protected ?GeneralForumTopicUnhidden $general_forum_topic_unhidden = null;
    protected ?VideoChatScheduled $video_chat_scheduled = null;
    protected ?VideoChatStarted $video_chat_started = null;
    protected ?VideoChatEnded $video_chat_ended = null;
    protected ?VideoChatParticipantsInvited $video_chat_participants_invited = null;
    protected ?WebAppData $web_app_data = null;
    protected ?InlineKeyboardMarkup $reply_markup = null;

    public function __construct($dataObject = [])
    {
        parent::__construct($dataObject);

        if (!empty($dataObject['forward_origin'])) {
            $this->forward_origin = MessageOrigin::create($dataObject['forward_origin']);
        }
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @return User|null
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @return Chat|null
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * @return Message|null
     */
    public function getReplyToMessage(): ?self
    {
        return $this->reply_to_message;
    }

    /**
     * @return User|null
     */
    public function getViaBot(): ?User
    {
        return $this->via_bot;
    }

    /**
     * @return int|null
     */
    public function getEditDate(): ?int
    {
        return $this->edit_date;
    }

    /**
     * @return string|null
     */
    public function getMediaGroupId(): ?string
    {
        return $this->media_group_id;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return array|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @return array|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    /**
     * @return Audio|null
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @return Voice|null
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->video_note;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * @return Poll|null
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * @return Dice|null
     */
    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    /**
     * @return User|null
     */
    public function getNewChatMember(): ?User
    {
        return $this->new_chat_member;
    }

    /**
     * @return User|null
     */
    public function getLeftChatMember(): ?User
    {
        return $this->left_chat_member;
    }

    /**
     * @return string|null
     */
    public function getNewChatTitle(): ?string
    {
        return $this->new_chat_title;
    }

    /**
     * @return array|null
     */
    public function getNewChatPhoto(): ?array
    {
        return $this->new_chat_photo;
    }

    /**
     * @return bool|null
     */
    public function getDeleteChatPhoto(): ?bool
    {
        return $this->delete_chat_photo;
    }

    /**
     * @return bool|null
     */
    public function getGroupChatCreated(): ?bool
    {
        return $this->group_chat_created;
    }

    /**
     * @return bool|null
     */
    public function getSupergroupChatCreated(): ?bool
    {
        return $this->supergroup_chat_created;
    }

    /**
     * @return bool|null
     */
    public function getChannelChatCreated(): ?bool
    {
        return $this->channel_chat_created;
    }

    /**
     * @return MessageAutoDeleteTimerChanged|null
     */
    public function getMessageAutoDeleteTimerChanged(): ?MessageAutoDeleteTimerChanged
    {
        return $this->message_auto_delete_timer_changed;
    }

    /**
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrate_to_chat_id;
    }

    /**
     * @return int|null
     */
    public function getMigrateFromChatId(): ?int
    {
        return $this->migrate_from_chat_id;
    }

    /**
     * @return Message|null
     */
    public function getPinnedMessage(): ?self
    {
        return $this->pinned_message;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @return SuccessfulPayment|null
     */
    public function getSuccessfulPayment(): ?SuccessfulPayment
    {
        return $this->successful_payment;
    }

    /**
     * @return User|null
     */
    public function getUserShared(): ?User
    {
        return $this->user_shared;
    }

    /**
     * @return Chat|null
     */
    public function getChatShared(): ?Chat
    {
        return $this->chat_shared;
    }

    /**
     * @return string|null
     */
    public function getConnectedWebsite(): ?string
    {
        return $this->connected_website;
    }

    /**
     * @return WriteAccessAllowed|null
     */
    public function getWriteAccessAllowed(): ?WriteAccessAllowed
    {
        return $this->write_access_allowed;
    }

    /**
     * @return PassportData|null
     */
    public function getPassportData(): ?PassportData
    {
        return $this->passport_data;
    }

    /**
     * @return ProximityAlertTriggered|null
     */
    public function getProximityAlertTriggered(): ?ProximityAlertTriggered
    {
        return $this->proximity_alert_triggered;
    }

    /**
     * @return ForumTopicCreated|null
     */
    public function getForumTopicCreated(): ?ForumTopicCreated
    {
        return $this->forum_topic_created;
    }

    /**
     * @return ForumTopicEdited|null
     */
    public function getForumTopicEdited(): ?ForumTopicEdited
    {
        return $this->forum_topic_edited;
    }

    /**
     * @return ForumTopicClosed|null
     */
    public function getForumTopicClosed(): ?ForumTopicClosed
    {
        return $this->forum_topic_closed;
    }

    /**
     * @return ForumTopicReopened|null
     */
    public function getForumTopicReopened(): ?ForumTopicReopened
    {
        return $this->forum_topic_reopened;
    }

    /**
     * @return GeneralForumTopicHidden|null
     */
    public function getGeneralForumTopicHidden(): ?GeneralForumTopicHidden
    {
        return $this->general_forum_topic_hidden;
    }

    /**
     * @return GeneralForumTopicUnhidden|null
     */
    public function getGeneralForumTopicUnhidden(): ?GeneralForumTopicUnhidden
    {
        return $this->general_forum_topic_unhidden;
    }

    /**
     * @return VideoChatScheduled|null
     */
    public function getVideoChatScheduled(): ?VideoChatScheduled
    {
        return $this->video_chat_scheduled;
    }

    /**
     * @return VideoChatStarted|null
     */
    public function getVideoChatStarted(): ?VideoChatStarted
    {
        return $this->video_chat_started;
    }

    /**
     * @return VideoChatEnded|null
     */
    public function getVideoChatEnded(): ?VideoChatEnded
    {
        return $this->video_chat_ended;
    }

    /**
     * @return VideoChatParticipantsInvited|null
     */
    public function getVideoChatParticipantsInvited(): ?VideoChatParticipantsInvited
    {
        return $this->video_chat_participants_invited;
    }

    /**
     * @return WebAppData|null
     */
    public function getWebAppData(): ?WebAppData
    {
        return $this->web_app_data;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function hasLink(): bool
    {
        if (empty($this->entities)) {
            return false;
        }
        foreach ($this->entities as $entity) {
            if ($entity->isLink()) {
                return true;
            }
        }

        return false;
    }

    public function getForwardOrigin(): ?MessageOrigin
    {
        return $this->forward_origin;
    }

}
