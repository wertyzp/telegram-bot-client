<?php

declare(strict_types=1);

use Werty\Http\Clients\TelegramBot\Exceptions\TelegramBotException;
use Werty\Http\Clients\TelegramBot\Requests\GetUserProfilePhotos;
use Werty\Http\Clients\TelegramBot\Requests\SendMessage;
use Werty\Http\Clients\TelegramBot\Types\ParseMode;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$token = '6963417705:AAH4jCenBy1i8u_Wynu6w4l9qD3qVvMjHgY';
$client = new \Werty\Http\Clients\TelegramBot\Client($token);
$chatId = 410378695;
$text = '\\\test';
echo $text.PHP_EOL;
$request = GetUserProfilePhotos::create($chatId);
try {
    $response = $client->getUserProfilePhotos($request);
    print_r($response);
} catch (\Werty\Http\Clients\TelegramBot\Exceptions\HttpException $e) {
    var_dump($e->getResponse());

} catch (TelegramBotException $e) {

}

