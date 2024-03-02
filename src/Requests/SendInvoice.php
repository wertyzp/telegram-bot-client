<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ForceReply;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\LabeledPrice;
use Werty\Http\Clients\TelegramBot\Types\MessageEntity;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;
use Werty\Http\Clients\TelegramBot\Types\ReplyParameters;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
title	String	Yes	Product name, 1-32 characters
description	String	Yes	Product description, 1-255 characters
payload	String	Yes	Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
provider_token	String	Yes	Payment provider token, obtained via @BotFather
currency	String	Yes	Three-letter ISO 4217 currency code, see more on currencies
prices	Array of LabeledPrice	Yes	Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
max_tip_amount	Integer	Optional	The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
suggested_tip_amounts	Array of Integer	Optional	A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
start_parameter	String	Optional	Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay button, allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty, forwarded copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the value used as the start parameter
provider_data	String	Optional	JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
photo_url	String	Optional	URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like it better when they see what they are paying for.
photo_size	Integer	Optional	Photo size in bytes
photo_width	Integer	Optional	Photo width
photo_height	Integer	Optional	Photo height
need_name	Boolean	Optional	Pass True if you require the user's full name to complete the order
need_phone_number	Boolean	Optional	Pass True if you require the user's phone number to complete the order
need_email	Boolean	Optional	Pass True if you require the user's email address to complete the order
need_shipping_address	Boolean	Optional	Pass True if you require the user's shipping address to complete the order
send_phone_number_to_provider	Boolean	Optional	Pass True if the user's phone number should be sent to provider
send_email_to_provider	Boolean	Optional	Pass True if the user's email address should be sent to provider
is_flexible	Boolean	Optional	Pass True if the final price depends on the shipping method
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_parameters	ReplyParameters	Optional	Description of the message to reply to
reply_markup	InlineKeyboardMarkup	Optional	A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not empty, the first button must be a Pay button.
 */
class SendInvoice extends Request
{
    protected const SERIALIZE_JSON = [
        'prices',
        'suggested_tip_amounts',
        'provider_data',
        'reply_markup',
    ];

    protected const TYPE_MAP = [
        'prices' => [LabeledPrice::class],
        'suggested_tip_amounts' => [self::T_INTEGER],
        'reply_markup' => InlineKeyboardMarkup::class,
    ];

    protected string|int $chat_id;
    protected ?int $message_thread_id = null;
    protected string $title;
    protected string $description;
    protected string $payload;
    protected string $provider_token;
    protected string $currency;
    protected array $prices;
    protected ?int $max_tip_amount = null;
    protected ?array $suggested_tip_amounts = null;
    protected ?string $start_parameter = null;
    protected ?string $provider_data = null;
    protected ?string $photo_url = null;
    protected ?int $photo_size = null;
    protected ?int $photo_width = null;
    protected ?int $photo_height = null;
    protected ?bool $need_name = null;
    protected ?bool $need_phone_number = null;
    protected ?bool $need_email = null;
    protected ?bool $need_shipping_address = null;
    protected ?bool $send_phone_number_to_provider = null;
    protected ?bool $send_email_to_provider = null;
    protected ?bool $is_flexible = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?ReplyParameters $reply_parameters = null;
    protected ?InlineKeyboardMarkup $reply_markup = null;

    public static function create(
        int|string $chatId,
        string $title,
        string $description,
        string $payload,
        string $providerToken,
        string $currency,
        array $prices
    ): static {
        return new static([
            'chat_id' => $chatId,
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $providerToken,
            'currency' => $currency,
            'prices' => $prices,
        ]);
    }

    public function setChatId(int|string $chat_id): void
    {
        $this->chat_id = $chat_id;
    }

    public function setMessageThreadId(?int $message_thread_id): void
    {
        $this->message_thread_id = $message_thread_id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPayload(string $payload): void
    {
        $this->payload = $payload;
    }

    public function setProviderToken(string $provider_token): void
    {
        $this->provider_token = $provider_token;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function setPrices(array $prices): void
    {
        $this->prices = $prices;
    }

    public function setMaxTipAmount(?int $max_tip_amount): void
    {
        $this->max_tip_amount = $max_tip_amount;
    }

    public function setSuggestedTipAmounts(?array $suggested_tip_amounts): void
    {
        $this->suggested_tip_amounts = $suggested_tip_amounts;
    }

    public function setStartParameter(?string $start_parameter): void
    {
        $this->start_parameter = $start_parameter;
    }

    public function setProviderData(?string $provider_data): void
    {
        $this->provider_data = $provider_data;
    }

    public function setPhotoUrl(?string $photo_url): void
    {
        $this->photo_url = $photo_url;
    }

    public function setPhotoSize(?int $photo_size): void
    {
        $this->photo_size = $photo_size;
    }

    public function setPhotoWidth(?int $photo_width): void
    {
        $this->photo_width = $photo_width;
    }

    public function setPhotoHeight(?int $photo_height): void
    {
        $this->photo_height = $photo_height;
    }

    public function setNeedName(?bool $need_name): void
    {
        $this->need_name = $need_name;
    }

    public function setNeedPhoneNumber(?bool $need_phone_number): void
    {
        $this->need_phone_number = $need_phone_number;
    }

    public function setNeedEmail(?bool $need_email): void
    {
        $this->need_email = $need_email;
    }

    public function setNeedShippingAddress(?bool $need_shipping_address): void
    {
        $this->need_shipping_address = $need_shipping_address;
    }

    public function setSendPhoneNumberToProvider(?bool $send_phone_number_to_provider): void
    {
        $this->send_phone_number_to_provider = $send_phone_number_to_provider;
    }

    public function setSendEmailToProvider(?bool $send_email_to_provider): void
    {
        $this->send_email_to_provider = $send_email_to_provider;
    }

    public function setIsFlexible(?bool $is_flexible): void
    {
        $this->is_flexible = $is_flexible;
    }

    public function setDisableNotification(?bool $disable_notification): void
    {
        $this->disable_notification = $disable_notification;
    }

    public function setProtectContent(?bool $protect_content): void
    {
        $this->protect_content = $protect_content;
    }

    public function setReplyParameters(?ReplyParameters $reply_parameters): void
    {
        $this->reply_parameters = $reply_parameters;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): void
    {
        $this->reply_markup = $reply_markup;
    }

}
