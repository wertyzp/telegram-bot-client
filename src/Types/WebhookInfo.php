<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
url	String	Webhook URL, may be empty if webhook is not set up
has_custom_certificate	Boolean	True, if a custom certificate was provided for webhook certificate checks
pending_update_count	Integer	Number of updates awaiting delivery
ip_address	String	Optional. Currently used webhook IP address
last_error_date	Integer	Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
last_error_message	String	Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
last_synchronization_error_date	Integer	Optional. Unix time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters
max_connections	Integer	Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
allowed_updates	Array of String	Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member
 */

class WebhookInfo extends Type
{
    protected string $url;
    protected bool $has_custom_certificate;
    protected int $pending_update_count;
    protected ?string $ip_address = null;
    protected ?int $last_error_date = null;
    protected ?string $last_error_message = null;
    protected ?int $last_synchronization_error_date = null;
    protected ?int $max_connections = null;
    protected ?array $allowed_updates = null;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return bool
     */
    public function isHasCustomCertificate(): bool
    {
        return $this->has_custom_certificate;
    }

    /**
     * @return int
     */
    public function getPendingUpdateCount(): int
    {
        return $this->pending_update_count;
    }

    /**
     * @return string|null
     */
    public function getIpAddress(): ?string
    {
        return $this->ip_address;
    }

    /**
     * @return int|null
     */
    public function getLastErrorDate(): ?int
    {
        return $this->last_error_date;
    }

    /**
     * @return string|null
     */
    public function getLastErrorMessage(): ?string
    {
        return $this->last_error_message;
    }

    /**
     * @return int|null
     */
    public function getLastSynchronizationErrorDate(): ?int
    {
        return $this->last_synchronization_error_date;
    }

    /**
     * @return int|null
     */
    public function getMaxConnections(): ?int
    {
        return $this->max_connections;
    }

    /**
     * @return array|null
     */
    public function getAllowedUpdates(): ?array
    {
        return $this->allowed_updates;
    }

}
