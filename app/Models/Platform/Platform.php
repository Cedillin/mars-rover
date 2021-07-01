<?php

namespace App\Models\Platform;

use App\Models\Coordinate\Coordinate;

class Platform
{
    private $minBorders;
    private $maxBorders;

    /**
     * Declare constructor
     *
     * @param Coordinate $maxCoordinate
     */
    public function __construct(Coordinate $maxCoordinate)
    {
        $this->minBorders = new Coordinate(0, 0);
        $this->maxBorders = $maxCoordinate;
    }

    /**
     * Get platform min borders
     *
     * @return Coordinate
     */
    public function getMinBorders(): Coordinate
    {
        return $this->minBorders;
    }


    /**
     * Get platform max borders
     *
     * @return Coordinate
     */
    public function getMaxBorders(): Coordinate
    {
        return $this->maxBorders;
    }
}
