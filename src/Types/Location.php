<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
longitude	Float	Longitude as defined by sender
latitude	Float	Latitude as defined by sender
horizontal_accuracy	Float number	Optional. The radius of uncertainty for the location, measured in meters; 0-1500
live_period	Integer	Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
heading	Integer	Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
proximity_alert_radius	Integer	Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 */
class Location extends Type
{
    protected float $longitude;
    protected float $latitude;
    protected ?float $horizontal_accuracy = null;
    protected ?int $live_period = null;
    protected ?int $heading = null;
    protected ?int $proximity_alert_radius = null;

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Longitude as defined by sender.
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * The radius of uncertainty for the location, measured in meters; 0-1500.
     * @return float|null
     */
    public function getHorizontalAccuracy(): ?float
    {
        return $this->horizontal_accuracy;
    }

    /**
     * Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
     * @return int|null
     */
    public function getLivePeriod(): ?int
    {
        return $this->live_period;
    }

    /**
     * The direction in which user is moving, in degrees; 1-360. For active live locations only.
     * @return int|null
     */
    public function getHeading(): ?int
    {
        return $this->heading;
    }

    /**
     * The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
     * @return int|null
     */
    public function getProximityAlertRadius(): ?int
    {
        return $this->proximity_alert_radius;
    }
}
