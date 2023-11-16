<?php

declare(strict_types=1);

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
$photo = \Werty\Http\Clients\TelegramBot\Types\InputMediaPhoto::create('test.png');
$sendMediaGroup = \Werty\Http\Clients\TelegramBot\Requests\SendMediaGroup::create($chatId, [$photo, $photo]);
$data = $sendMediaGroup->toPostData();

$result = $client->sendMediaGroup($sendMediaGroup);
print_r($result);

