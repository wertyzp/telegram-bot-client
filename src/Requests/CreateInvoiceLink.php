<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\LabeledPrice;

/**
 * Parameter    Type    Required    Description
 * title    String    Yes    Product name, 1-32 characters
 * description    String    Yes    Product description, 1-255 characters
 * payload    String    Yes    Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
 * provider_token    String    Yes    Payment provider token, obtained via BotFather
 * currency    String    Yes    Three-letter ISO 4217 currency code, see more on currencies
 * prices    Array of LabeledPrice    Yes    Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
 * max_tip_amount    Integer    Optional    The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
 * suggested_tip_amounts    Array of Integer    Optional    A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * provider_data    String    Optional    JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
 * photo_url    String    Optional    URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
 * photo_size    Integer    Optional    Photo size in bytes
 * photo_width    Integer    Optional    Photo width
 * photo_height    Integer    Optional    Photo height
 * need_name    Boolean    Optional    Pass True if you require the user's full name to complete the order
 * need_phone_number    Boolean    Optional    Pass True if you require the user's phone number to complete the order
 * need_email    Boolean    Optional    Pass True if you require the user's email address to complete the order
 * need_shipping_address    Boolean    Optional    Pass True if you require the user's shipping address to complete the order
 * send_phone_number_to_provider    Boolean    Optional    Pass True if the user's phone number should be sent to the provider
 * send_email_to_provider    Boolean    Optional    Pass True if the user's email address should be sent to the provider
 * is_flexible    Boolean    Optional    Pass True if the final price depends on the shipping method
 */

class CreateInvoiceLink extends Request
{
    protected const SERIALIZE_JSON = [
        'prices',
        'suggested_tip_amounts',
    ];

    protected const TYPE_MAP = [
        'prices' => [LabeledPrice::class],
        'suggested_tip_amounts' => [self::T_INTEGER],
    ];

    protected string $title;
    protected string $description;
    protected string $payload;
    protected string $provider_token;
    protected string $currency;
    protected array $prices;
    protected ?int $max_tip_amount = null;
    protected ?array $suggested_tip_amounts = null;
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

    public static function create(
        string $title,
        string $description,
        string $payload,
        string $providerToken,
        string $currency,
        array $prices
    ): self {
        return new static([
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $providerToken,
            'currency' => $currency,
            'prices' => $prices,
        ]);
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

}
