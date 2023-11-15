<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
location	Location	Venue location. Can't be a live location
title	String	Name of the venue
address	String	Address of the venue
foursquare_id	String	Optional. Foursquare identifier of the venue
foursquare_type	String	Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
google_place_id	String	Optional. Google Places identifier of the venue
google_place_type	String	Optional. Google Places type of the venue. (See supported types.)
 */
class Venue extends Type
{
    protected const TYPE_MAP = [
        'location' => Location::class,
    ];

    protected Location $location;
    protected string $title;
    protected string $address;
    protected ?string $foursquare_id = null;
    protected ?string $foursquare_type = null;
    protected ?string $google_place_id = null;
    protected ?string $google_place_type = null;

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * Name of the venue
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Address of the venue
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Foursquare identifier of the venue
     * @return string|null
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquare_id;
    }

    /**
     * Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     * @return string|null
     */
    public function getFoursquareType(): ?string
    {
        return $this->foursquare_type;
    }

    /**
     * Google Places identifier of the venue
     * @return string|null
     */
    public function getGooglePlaceId(): ?string
    {
        return $this->google_place_id;
    }

    /**
     * Google Places type of the venue. (See supported types.)
     * @return string|null
     */
    public function getGooglePlaceType(): ?string
    {
        return $this->google_place_type;
    }

}
