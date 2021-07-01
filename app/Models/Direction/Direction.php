<?php

namespace App\Models\Direction;


class Direction
{
    // Declare coordinates NWES
    const NORTH = "N";
    const WEST = "W";
    const EAST = "E";
    const SOUTH = "S";

    private $orientation = "";

    public function __construct(string $orientation)
    {
        $orientation = trim($orientation);

        if ($this->isValid($orientation)) {
            $this->orientation = $orientation;
            return;
        }

        throw new \Exception("Invalid Orientation, given: " . $orientation);
    }

    public function getOrientation(): string
    {
        return $this->orientation;
    }

    /**
     * Validate orientation position
     *
     * @param $orientation
     * @return bool
     */
    private function isValid($orientation): bool
    {
        return in_array(
            $orientation,
            [
                self::NORTH,
                self::WEST,
                self::EAST,
                self::SOUTH
            ]
        );
    }
}
