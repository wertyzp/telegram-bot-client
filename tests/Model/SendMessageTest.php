<?php

declare(strict_types=1);

namespace Tests\Model;

use Tests\TestCase;
use Werty\Http\Clients\TelegramBot\Client;
use Werty\Http\Clients\TelegramBot\Requests\Chat;

class SendMessageTest extends TestCase
{
    protected Client $client;
    protected int $chatId;
    protected function setUp(): void
    {
        $this->chatId = 410378695;
        $this->client = new Client('6963417705:AAH4jCenBy1i8u_Wynu6w4l9qD3qVvMjHgY');
        parent::setUp();
    }

    public function testSendMessage(): void
    {
        $sendMessage = new \Werty\Http\Clients\TelegramBot\Requests\SendMessage();
        $data = $sendMessage->toArray();

        $this->assertTrue(true);
    }

    public function testGetChat(): void
    {
        $chat = $this->client->getChat($this->chatId);
        $this->assertInstanceOf(Chat::class, $chat);
        print_r($chat);die();
    }
}
