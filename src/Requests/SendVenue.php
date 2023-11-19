<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ForceReply;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
latitude	Float number	Yes	Latitude of the venue
longitude	Float number	Yes	Longitude of the venue
title	String	Yes	Name of the venue
address	String	Yes	Address of the venue
foursquare_id	String	Optional	Foursquare identifier of the venue
foursquare_type	String	Optional	Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
google_place_id	String	Optional	Google Places identifier of the venue
google_place_type	String	Optional	Google Places type of the venue. (See supported types.)
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendVenue extends Request
{
    protected const SERIALIZE_JSON = [
        'reply_markup',
    ];

    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected float $latitude;
    protected float $longitude;
    protected string $title;
    protected string $address;
    protected ?string $foursquare_id = null;
    protected ?string $foursquare_type = null;
    protected ?string $google_place_id = null;
    protected ?string $google_place_type = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup = null;

    public static function create(int|string $chatId, float $latitude, float $longitude, string $title, string $address): static
    {
        return new static([
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return SendVenue
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendVenue
     */
    public function setMessageThreadId(?int $message_thread_id): self
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    /**
     * @param float $latitude
     * @return SendVenue
     */
    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @param float $longitude
     * @return SendVenue
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @param string $title
     * @return SendVenue
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $address
     * @return SendVenue
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param string|null $foursquare_id
     * @return SendVenue
     */
    public function setFoursquareId(?string $foursquare_id): self
    {
        $this->foursquare_id = $foursquare_id;

        return $this;
    }

    /**
     * @param string|null $foursquare_type
     * @return SendVenue
     */
    public function setFoursquareType(?string $foursquare_type): self
    {
        $this->foursquare_type = $foursquare_type;

        return $this;
    }

    /**
     * @param string|null $google_place_id
     * @return SendVenue
     */
    public function setGooglePlaceId(?string $google_place_id): self
    {
        $this->google_place_id = $google_place_id;

        return $this;
    }

    /**
     * @param string|null $google_place_type
     * @return SendVenue
     */
    public function setGooglePlaceType(?string $google_place_type): self
    {
        $this->google_place_type = $google_place_type;

        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendVenue
     */
    public function setDisableNotification(?bool $disable_notification): self
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendVenue
     */
    public function setProtectContent(?bool $protect_content): self
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendVenue
     */
    public function setReplyToMessageId(?int $reply_to_message_id): self
    {
        $this->reply_to_message_id = $reply_to_message_id;

        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendVenue
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): self
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;

        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendVenue
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): self
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
