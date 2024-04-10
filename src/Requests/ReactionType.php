<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\Type;

/**
"👍", "👎", "❤", "🔥", "🥰", "👏", "😁", "🤔", "🤯", "😱", "🤬", "😢", "🎉", "🤩", "🤮", "💩", "🙏", "👌", "🕊", "🤡", "🥱", "🥴", "😍", "🐳", "❤‍🔥", "🌚", "🌭", "💯", "🤣", "⚡", "🍌", "🏆", "💔", "🤨", "😐", "🍓", "🍾", "💋", "🖕", "😈", "😴", "😭", "🤓", "👻", "👨‍💻", "👀", "🎃", "🙈", "😇", "😨", "🤝", "✍", "🤗", "🫡", "🎅", "🎄", "☃", "💅", "🤪", "🗿", "🆒", "💘", "🙉", "🦄", "😘", "💊", "🙊", "😎", "👾", "🤷‍♂", "🤷", "🤷‍♀", "😡"
 */

class ReactionType extends Type
{
    public string $type = 'emoji';
    public string $reaction;

    public const THUMBS_UP = '👍';
    public const THUMBS_DOWN = '👎';
    public const HEART = '❤';
    public const FIRE = '🔥';
    public const HEART_EYES = '🥰';
    public const CLAPPING_HANDS = '👏';
    public const BEAMING_FACE_WITH_SMILING_EYES = '😁';
    public const THINKING_FACE = '🤔';
    public const FACE_WITH_OPEN_MOUTH = '🤯';
    public const FACE_SCREAMING_IN_FEAR = '😱';
    public const FACE_WITH_SYMBOLS_ON_MOUTH = '🤬';
    public const CRYING_FACE = '😢';
    public const PARTY_POPPER = '🎉';
    public const STAR_STRUCK = '🤩';
    public const FACE_VOMITING = '🤮';
    public const PILE_OF_POO = '💩';
    public const FOLDED_HANDS = '🙏';
    public const OK_HAND = '👌';
    public const DOVE = '🕊';
    public const CLOWN_FACE = '🤡';
    public const YAWNING_FACE = '🥱';
    public const FACE_WITH_SWIRL = '🥴';
    public const HEART_EYES_CAT = '😍';
    public const SPERM_WHALE = '🐳';
    public const HEART_ON_FIRE = '❤‍🔥';
    public const NEW_MOON_FACE = '🌚';
    public const HOT_DOG = '🌭';
    public const HUNDRED_POINTS = '💯';
    public const ROLLING_ON_THE_FLOOR_LAUGHING = '🤣';
    public const HIGH_VOLTAGE = '⚡';
    public const BANANA = '🍌';
    public const TROPHY = '🏆';
    public const BROKEN_HEART = '💔';
    public const FACE_WITH_RAISED_EYEBROW = '🤨';
    public const NEUTRAL_FACE = '😐';
    public const STRAWBERRY = '🍓';
    public const BOTTLE_WITH_POPPING_CORK = '🍾';
    public const KISS_MARK = '💋';
    public const REVERSED_HAND_WITH_MIDDLE_FINGER_EXTENDED = '🖕';
    public const SMILING_FACE_WITH_HORNS = '😈';
    public const SLEEPING_FACE = '😴';
    public const CRYING_FACE_2 = '😭';
    public const NERD_FACE = '🤓';
    public const GHOST = '👻';
    //
    //"👨‍💻", "👀", "🎃", "🙈", "😇", "😨", "🤝", "✍", "🤗", "🫡", "🎅", "🎄", "☃", "💅", "🤪", "🗿", "🆒", "💘", "🙉", "🦄", "😘", "💊", "🙊", "😎", "👾", "🤷‍♂", "🤷", "🤷‍♀", "😡"
    public const COMPUTER_PROGRAMMER = '👨‍💻';
    public const EYES = '👀';
    public const JACK_O_LANTERN = '🎃';
    public const SEE_NO_EVIL_MONKEY = '🙈';
    public const SMILING_FACE_WITH_HALO = '😇';
    public const FACE_WITH_HAND_OVER_MOUTH = '😨';
    public const HANDSHAKE = '🤝';
    public const WRITING_HAND = '✍';
    public const HUGGING_FACE = '🤗';
    public const ANATOMICAL_HEART = '🫡';
    public const FATHER_CHRISTMAS = '🎅';
    public const CHRISTMAS_TREE = '🎄';
    public const SNOWMAN = '☃';
    public const NAIL_POLISH = '💅';
    public const ZANY_FACE = '🤪';
    public const MOAI = '🗿';
    public const COOL = '🆒';
    public const HEART_WITH_ARROW = '💘';
    public const HEAR_NO_EVIL_MONKEY = '🙉';
    public const UNICORN = '🦄';
    public const FACE_BLOWING_A_KISS = '😘';
    public const PILL = '💊';
    public const SPEAK_NO_EVIL_MONKEY = '🙊';
    public const SMILING_FACE_WITH_SUNGLASSES = '😎';
    public const ALIEN_MONSTER = '👾';
    public const PERSON_SHRUGGING = '🤷‍♂';
    public const PERSON_SHRUGGING_2 = '🤷';
    public const PERSON_SHRUGGING_3 = '🤷‍♀';
    public const POUTING_FACE = '😡';

    public static function create(string $reaction): self
    {
        return new static([
            'reaction' => $reaction,
        ]);
    }
}
