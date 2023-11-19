<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to send point on the map. On success, the sent Message
 *  is returned.
 */
class SendLocation extends Request
{
    protected const SERIALIZE_JSON = [
        'reply_markup',
    ];

    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername).
     */
    protected int|string $chat_id;
    /**
     * Unique identifier for the target message thread (topic) of the forum;
     * for forum supergroups only.
     */
    protected ?int $message_thread_id;
    /**
     * Latitude of the location.
     */
    protected float $latitude;
    /**
     * Longitude of the location.
     */
    protected float $longitude;
    /**
     * The radius of uncertainty for the location, measured in meters; 0-1500.
     */
    protected ?float $horizontal_accuracy;
    /**
     * Period in seconds for which the location will be updated (see Live Loc
     * ations, should be between 60 and 86400.
     */
    protected ?int $live_period;
    /**
     * For live locations, a direction in which the user is moving, in degree
     * s. Must be between 1 and 360 if specified.
     */
    protected ?int $heading;
    /**
     * For live locations, a maximum distance for proximity alerts about appr
     * oaching another chat member, in meters. Must be between 1 and 100000 i
     * f specified.
     */
    protected ?int $proximity_alert_radius;
    /**
     * Sends the message silently. Users will receive a notification with no
     * sound.
     */
    protected ?bool $disable_notification;
    /**
     * Protects the contents of the sent message from forwarding and saving.
     */
    protected ?bool $protect_content;
    /**
     * If the message is a reply, ID of the original message.
     */
    protected ?int $reply_to_message_id;
    /**
     * Pass True if the message should be sent even if the specified replied-
     * to message is not found.
     */
    protected ?bool $allow_sending_without_reply;
    /**
     * Additional interface options. A JSON-serialized object for an inline k
     * eyboard, custom reply keyboard, instructions to remove reply keyboard
     * or to force a reply from the user.
     */
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup;

    public static function create(int|string $chatId, float $latitude, float $longitude): self
    {
        return new self([
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return SendLocation
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @param int $messageThreadId
     * @return SendLocation
     */
    public function setMessageThreadId(int $messageThreadId): self
    {
        $this->message_thread_id = $messageThreadId;

        return $this;
    }

    /**
     * @param float $latitude
     * @return SendLocation
     */
    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @param float $longitude
     * @return SendLocation
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @param float $horizontalAccuracy
     * @return SendLocation
     */
    public function setHorizontalAccuracy(float $horizontalAccuracy): self
    {
        $this->horizontal_accuracy = $horizontalAccuracy;

        return $this;
    }

    /**
     * @param int $livePeriod
     * @return SendLocation
     */
    public function setLivePeriod(int $livePeriod): self
    {
        $this->live_period = $livePeriod;

        return $this;
    }

    /**
     * @param int $heading
     * @return SendLocation
     */
    public function setHeading(int $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * @param int $proximityAlertRadius
     * @return SendLocation
     */
    public function setProximityAlertRadius(int $proximityAlertRadius): self
    {
        $this->proximity_alert_radius = $proximityAlertRadius;

        return $this;
    }

    /**
     * @param bool $disableNotification
     * @return SendLocation
     */
    public function setDisableNotification(bool $disableNotification): self
    {
        $this->disable_notification = $disableNotification;

        return $this;
    }

    /**
     * @param bool $protectContent
     * @return SendLocation
     */
    public function setProtectContent(bool $protectContent): self
    {
        $this->protect_content = $protectContent;

        return $this;
    }

    /**
     * @param int $replyToMessageId
     * @return SendLocation
     */
    public function setReplyToMessageId(int $replyToMessageId): self
    {
        $this->reply_to_message_id = $replyToMessageId;

        return $this;
    }

    /**
     * @param bool $allowSendingWithoutReply
     * @return SendLocation
     */
    public function setAllowSendingWithoutReply(bool $allowSendingWithoutReply): self
    {
        $this->allow_sending_without_reply = $allowSendingWithoutReply;

        return $this;
    }

    /**
     * @param null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup
     * @return SendLocation
     */
    public function setReplyMarkup(null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup): self
    {
        $this->reply_markup = $replyMarkup;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chat_id;
    }

    /**
     * @return int
     */
    public function getMessageThreadId(): int
    {
        return $this->message_thread_id;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @return float
     */
    public function getHorizontalAccuracy(): float
    {
        return $this->horizontal_accuracy;
    }

    /**
     * @return int
     */
    public function getLivePeriod(): int
    {
        return $this->live_period;
    }

    /**
     * @return int
     */
    public function getHeading(): int
    {
        return $this->heading;
    }

    /**
     * @return int
     */
    public function getProximityAlertRadius(): int
    {
        return $this->proximity_alert_radius;
    }

    /**
     * @return bool
     */
    public function getDisableNotification(): bool
    {
        return $this->disable_notification;
    }

    /**
     * @return bool
     */
    public function getProtectContent(): bool
    {
        return $this->protect_content;
    }

    /**
     * @return int
     */
    public function getReplyToMessageId(): int
    {
        return $this->reply_to_message_id;
    }

    /**
     * @return bool
     */
    public function getAllowSendingWithoutReply(): bool
    {
        return $this->allow_sending_without_reply;
    }

    /**
     * @return null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply
     */
    public function getReplyMarkup(): null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply
    {
        return $this->reply_markup;
    }
}
