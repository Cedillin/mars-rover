<?php

namespace App\Models\Coordinate;

class Coordinate
{
    private int $x;
    private int $y;

    /**
     * Declare constructor
     *
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = (int)$x;
        $this->y = (int)$y;
    }

    /**
     * Get X position
     *
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * Get Y position
     *
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }
}
