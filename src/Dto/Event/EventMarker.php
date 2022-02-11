<?php

declare(strict_types=1);

namespace App\Dto\Event;

use App\Dto\GeoPosition;
use App\Entity\Event;

class EventMarker
{
    public string $headline;

    public string $target = '_self';

    public GeoPosition $position;

    public static function createFromEntity(Event $event): EventMarker
    {
        return (new EventMarker())
            ->createPosition($event->getCity()->getLatitude(), $event->getCity()->getLongitude());
    }

    public function getPosition(): GeoPosition
    {
        return $this->position;
    }

    public function createPosition(float $lat, $lon): EventMarker
    {
        $this->position = new GeoPosition($lat, $lon);

        return $this;
    }

    public function setHeadLine(string $headline): EventMarker
    {
        $this->headline = $headline;

        return $this;
    }
}
