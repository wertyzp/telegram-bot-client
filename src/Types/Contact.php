<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * Field	Type	Description
phone_number	String	Contact's phone number
first_name	String	Contact's first name
last_name	String	Optional. Contact's last name
user_id	Integer	Optional. Contact's user identifier in Telegram. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
vcard	String	Optional. Additional data about the contact in the form of a vCard
 */
class Contact extends Type
{
    protected string $phone_number;
    protected string $first_name;
    protected ?string $last_name = null;
    protected ?int $user_id = null;
    protected ?string $vcard = null;

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @return string|null
     */
    public function getVcard(): ?string
    {
        return $this->vcard;
    }

}
