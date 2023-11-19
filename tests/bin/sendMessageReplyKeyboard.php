<?php

declare(strict_types=1);

use Werty\Http\Clients\TelegramBot\Client;
use Werty\Http\Clients\TelegramBot\Exceptions\HttpException;
use Werty\Http\Clients\TelegramBot\Exceptions\TelegramBotException;
use Werty\Http\Clients\TelegramBot\Requests\SendMessage;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardButton;
use Werty\Http\Clients\TelegramBot\Types\ParseMode;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$config = parse_ini_file('.env', true, INI_SCANNER_TYPED);
$token = $config['BOT_TOKEN'];
$chatId = $config['CHAT_ID'];
$client = new Client($token);
$text = '\\\test';
$message = SendMessage::create($chatId, $text);
$message->setParseMode(ParseMode::MARKDOWN_V2);

$inlineKeyboard = [
    [InlineKeyboardButton::create('test', 'test')],
];

$replyMarkup = new ReplyKeyboardMarkup();
$replyMarkup->setKeyboard($inlineKeyboard);

$message->setReplyMarkup($replyMarkup);
try {
    $response = $client->sendMessage($message);
} catch (HttpException $e) {
    var_dump($e->getResponse());

} catch (TelegramBotException $e) {

}
print_r($response);
