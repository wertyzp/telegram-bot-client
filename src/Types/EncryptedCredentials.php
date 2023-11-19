<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
data	String	Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets required for EncryptedPassportElement decryption and authentication
hash	String	Base64-encoded data hash for data authentication
secret	String	Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
 */
class EncryptedCredentials extends Type
{
    protected string $data;
    protected string $hash;
    protected string $secret;

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }
}
