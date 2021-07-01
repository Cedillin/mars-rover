<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoverCommandsRequest;
use App\Models\Coordinate\Coordinate;
use App\Models\Platform\Platform;
use App\Models\Rover\RoverSetup;
use App\Models\Rover\Rover;
use App\Services\CommandParser;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoverController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return View
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Validate, receive and process the Rover Commands
     *
     * @param RoverCommandsRequest $request
     * @model Coordinate
     * @model Rover
     * @model RoverSetup
     * @model CommandParser
     * @model Platform
     * @return View
     */
    public function giveCommands(Request $request)
    {
        // Receive a validated request from the custom RoverCommandRequest
        // $data = $request->validated();
        $request->validate([
            'x' => 'required|numeric|max:200',
            'y' => 'required|numeric|max:200',
            'facing_direction' => 'required|string',
            'command_string' => 'required|string'
        ]);

        $data = $request->all();

        try {
            $x = $data['x'];
            $y = $data['y'];
            $facingDirection = $data['facing_direction'];
            $commandString = $data['command_string'];

            $coordinates = new Coordinate(200, 200);
            $planet = new Platform($coordinates);

            $inputNumber = 0;
            $squadCounter = 0;

            // Initialize Rover
            $rover = new Rover();
            // Receive and Send Rover front-end commands
            $rover->setSetup(new RoverSetup("$x $y $facingDirection"));
            $rover->setCommands((new CommandParser($commandString))
                ->getCommandsCollection());
            $rover->execute();

            $position_string = explode(" ", $rover->getSetupAsString());

            // Determinate position
            $position = (object)[
                'x' => $position_string[0],
                'y' => $position_string[1],
                'direction' => $this->parseDirection($position_string[2])
            ];

            return view('results', compact('position'));
        } catch (\Exception $e) {
            return redirect()->route('home')
                ->withErrors(['msg' => $e->getMessage()])
                ->withInput($request->input());
        }
    }

    /**
     * Parse the rover direction based on request data
     *
     * @param $direction
     * @return string
     */
    private function parseDirection($direction)
    {
        switch ($direction) {
            case 'N':
                $directionString = 'NORTH';
                break;
            case 'E':
                $directionString = 'EAST';
                break;
            case 'W':
                $directionString = 'WEST';
                break;
            case 'S':
                $directionString = 'SOUTH';
                break;
            default:
                $directionString = 'INVALID DIRECTION';
                break;
        }

        return $directionString;
    }
}
