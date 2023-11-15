<?php

declare(strict_types=1);

use Werty\Http\Clients\TelegramBot\Client;
use Werty\Http\Clients\TelegramBot\Requests\SendPoll;
use Werty\Http\Clients\TelegramBot\Requests\SendVenue;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$token = '6963417705:AAH4jCenBy1i8u_Wynu6w4l9qD3qVvMjHgY';
$client = new Client($token);
$chatId = 410378695;
$message = SendPoll::create($chatId, 'test', ['test1', 'test2']);
$client->sendPoll($message);

