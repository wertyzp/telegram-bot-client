<?php

declare(strict_types=1);

use Werty\Http\Clients\TelegramBot\Exceptions\TelegramBotException;
use Werty\Http\Clients\TelegramBot\Requests\SendMessage;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardButton;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ParseMode;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$token = '6963417705:AAH4jCenBy1i8u_Wynu6w4l9qD3qVvMjHgY';
$client = new \Werty\Http\Clients\TelegramBot\Client($token);
$chatId = 410378695;
$text = '\\\test';
echo $text.PHP_EOL;
$message = SendMessage::create($chatId, $text);
$message->setParseMode(ParseMode::MARKDOWN_V2);

$inlineKeyboard = [
    [InlineKeyboardButton::create('test', 'test')],
];

$replyMarkup = new InlineKeyboardMarkup();
$replyMarkup->setInlineKeyboard($inlineKeyboard);

$message->setReplyMarkup($replyMarkup);
try {
    $response = $client->sendMessage($message);
} catch (\Werty\Http\Clients\TelegramBot\Exceptions\HttpException $e) {
    var_dump($e->getResponse());

} catch (TelegramBotException $e) {

}
print_r($response);
