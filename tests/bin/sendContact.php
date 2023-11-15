<?php

declare(strict_types=1);

use Werty\Http\Clients\TelegramBot\Client;
use Werty\Http\Clients\TelegramBot\Requests\SendContact;
use Werty\Http\Clients\TelegramBot\Requests\SendVenue;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$token = '6963417705:AAH4jCenBy1i8u_Wynu6w4l9qD3qVvMjHgY';
$client = new Client($token);
$chatId = 410378695;
$message = SendContact::create($chatId, '123123', 'dmitry');
$client->sendContact($message);

