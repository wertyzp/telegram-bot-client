<?php

declare(strict_types=1);

use Werty\Http\Clients\TelegramBot\Client;
use Werty\Http\Clients\TelegramBot\Exceptions\HttpException;
use Werty\Http\Clients\TelegramBot\Exceptions\TelegramBotException;
use Werty\Http\Clients\TelegramBot\Requests\SendContact;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$config = parse_ini_file('.env', true, INI_SCANNER_TYPED);
$token = $config['BOT_TOKEN'];
$chatId = $config['CHAT_ID'];
$client = new Client($token);
$message = SendContact::create($chatId, '123123', 'dmitry');
$client->sendContact($message);

