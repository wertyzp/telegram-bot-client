<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\InputFile;

/**
 * Parameter    Type	Required	Description
 * url	String	Yes	HTTPS URL to send updates to. Use an empty string to remove webhook integration
 * certificate	InputFile	Optional	Upload your public key certificate so that the root certificate in use can be checked. See our self-signed guide for details.
 * ip_address	String	Optional	The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS
 * max_connections	Integer	Optional	The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput.
 * allowed_updates	Array of String	Optional	A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member (default). If not specified, the previous setting will be used.
 * Please note that this parameter doesn't affect updates created before the call to the setWebhook, so unwanted updates may be received for a short period of time.
 * drop_pending_updates	Boolean	Optional	Pass True to drop all pending updates
 * secret_token	String	Optional	A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook request, 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed. The header is useful to ensure that the request comes from a webhook set by you.
 */
class SetWebhook extends Request
{
    protected string $url;
    protected ?InputFile $certificate = null;
    protected ?string $ip_address = null;
    protected ?int $max_connections = null;
    protected ?array $allowed_updates = null;
    protected ?bool $drop_pending_updates = null;
    protected ?string $secret_token = null;

    /**
     * @param string $url
     * @return SetWebhook
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param InputFile|null $certificate
     * @return SetWebhook
     */
    public function setCertificate(?InputFile $certificate): self
    {
        $this->certificate = $certificate;

        return $this;
    }

    /**
     * @param string|null $ip_address
     * @return SetWebhook
     */
    public function setIpAddress(?string $ip_address): self
    {
        $this->ip_address = $ip_address;

        return $this;
    }

    /**
     * @param int|null $max_connections
     * @return SetWebhook
     */
    public function setMaxConnections(?int $max_connections): self
    {
        $this->max_connections = $max_connections;

        return $this;
    }

    /**
     * @param array|null $allowed_updates
     * @return SetWebhook
     */
    public function setAllowedUpdates(?array $allowed_updates): self
    {
        $this->allowed_updates = $allowed_updates;

        return $this;
    }

    /**
     * @param bool|null $drop_pending_updates
     * @return SetWebhook
     */
    public function setDropPendingUpdates(?bool $drop_pending_updates): self
    {
        $this->drop_pending_updates = $drop_pending_updates;

        return $this;
    }

    /**
     * @param string|null $secret_token
     * @return SetWebhook
     */
    public function setSecretToken(?string $secret_token): self
    {
        $this->secret_token = $secret_token;

        return $this;
    }
}
