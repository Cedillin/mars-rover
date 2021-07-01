<?php

namespace App\Models\Rover;

use App\Models\Coordinate\Coordinate;
use App\Models\Direction\Direction;

class RoverSetup
{
    private $coordinate;
    private $direction;

    /**
     * Declare constructor
     *
     * @param $setupString
     */
    public function __construct($setupString)
    {
        $setup = explode(" ", $setupString);
        $this->coordinate = new Coordinate($setup[0], $setup[1]);
        // TODO: Handle exception
        $this->direction = new Direction($setup[2]);
    }

    /**
     * Get Rover current coordinates
     *
     * @return Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    /**
     * Get Rover current direction
     *
     * @return Direction
     */
    public function getDirection(): Direction
    {
        return $this->direction;
    }

    /**
     * Helper to transform orientation to string
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->coordinate->getX() . " " . $this->coordinate->getY() . " " . $this->direction->getOrientation();
    }
}
