<?php

declare(strict_types=1);

use Werty\Http\Clients\TelegramBot\Client;
use Werty\Http\Clients\TelegramBot\Exceptions\HttpException;
use Werty\Http\Clients\TelegramBot\Exceptions\TelegramBotException;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$config = parse_ini_file('.env', true, INI_SCANNER_TYPED);
$token = $config['BOT_TOKEN'];
$chatId = $config['CHAT_ID'];
$client = new Client($token);

$text = 'test successful';
$photo = 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png';
$content = file_get_contents($photo);
file_put_contents('test.png', $content);
register_shutdown_function(function () {
    unlink('test.png');
});
$mimeType = mime_content_type('test.png');
$photo = \Werty\Http\Clients\TelegramBot\Types\InputMediaPhoto::create('test.png');
$sendMediaGroup = \Werty\Http\Clients\TelegramBot\Requests\SendMediaGroup::create($chatId, [$photo, $photo]);
$data = $sendMediaGroup->toPostData();

$result = $client->sendMediaGroup($sendMediaGroup);
print_r($result);

