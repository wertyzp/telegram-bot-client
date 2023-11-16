<?php

declare(strict_types=1);

use Werty\Http\Clients\TelegramBot\Types\MessageEntity;
use Werty\Http\Clients\TelegramBot\Requests\SendPhoto;
use Werty\Http\Clients\TelegramBot\Types\InputFile;

chdir(dirname(dirname(__DIR__)));

require_once 'vendor/autoload.php';

$token = '6963417705:AAH4jCenBy1i8u_Wynu6w4l9qD3qVvMjHgY';
$client = new \Werty\Http\Clients\TelegramBot\Client($token);
$chatId = 410378695;
$text = 'test successful';
$photo = 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png';
$content = file_get_contents($photo);
file_put_contents('test.png', $content);
register_shutdown_function(function () {
    unlink('test.png');
});
$mimeType = mime_content_type('test.png');
$photo = new InputFile('test.png', $mimeType);
$message = SendPhoto::create($chatId, $photo);
$message->setCaption('test successful');
$message->setCaptionEntities([
    MessageEntity::create('bold', 0, 4)
]);
$data = $message->toPostData();
$client->sendPhoto($message);

