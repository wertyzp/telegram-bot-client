<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
title	String	Title of the game
description	String	Description of the game
photo	Array of PhotoSize	Photo that will be displayed in the game message in chats.
text	String	Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
text_entities	Array of MessageEntity	Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
animation	Animation	Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
 */

class Game extends Type
{
    protected const TYPE_MAP = [
        'photo' => [PhotoSize::class],
        'text_entities' => [MessageEntity::class],
        'animation' => Animation::class,
    ];

    protected string $title;
    protected string $description;
    protected array $photo;
    protected ?string $text = null;
    protected ?array $text_entities = null;
    protected ?Animation $animation = null;

}
