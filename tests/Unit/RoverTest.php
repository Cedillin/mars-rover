<?php

namespace Tests\Unit;

use App\Http\Controllers\RoverController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    /**
     * Check if rover can move
     *
     * @return void
     */
    public function rover_can_move()
    {
        $rover = new RoverController();

        $request = Request::create('/results', 'POST', [
            'x' => 100,
            'y' => 100,
            'facing_direction' => 'N',
            'command_string' => 'FLFRFLLFRF',
        ]);

        $response = $rover->giveCommands($request);

        $this->assertInstanceOf(View::class, $response);
    }
}
