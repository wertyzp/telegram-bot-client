<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
point	String	The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or “chin”.
x_shift	Float number	Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example, choosing -1.0 will place mask just to the left of the default mask position.
y_shift	Float number	Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0 will place the mask just below the default mask position.
scale	Float number	Mask scaling coefficient. For example, 2.0 means double size.
 */
class MaskPosition extends Type
{
    protected string $point;
    protected float $xShift;
    protected float $yShift;
    protected float $scale;

    /**
     * @return string
     */
    public function getPoint(): string
    {
        return $this->point;
    }

    /**
     * @return float
     */
    public function getXShift(): float
    {
        return $this->xShift;
    }

    /**
     * @return float
     */
    public function getYShift(): float
    {
        return $this->yShift;
    }

    /**
     * @return float
     */
    public function getScale(): float
    {
        return $this->scale;
    }
}
