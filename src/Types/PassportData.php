<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
data	Array of EncryptedPassportElement	Array with information about documents and other Telegram Passport elements that was shared with the bot
credentials	EncryptedCredentials	Encrypted credentials required to decrypt the data
 */
class PassportData extends Type
{
    protected const TYPE_MAP = [
        'data' => [EncryptedPassportElement::class],
        'credentials' => EncryptedCredentials::class,
    ];

    protected array $data;
    protected EncryptedCredentials $credentials;

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return EncryptedCredentials
     */
    public function getCredentials(): EncryptedCredentials
    {
        return $this->credentials;
    }
}
