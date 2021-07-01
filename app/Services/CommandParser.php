<?php

namespace App\Services;

use App\Models\Command\CommandsCollection;
use App\Services\CommandMaker;

class CommandParser
{
    protected $commandsCollection;

    /**
     * Declare constructor
     *
     * @param string $commandInput
     */
    public function __construct(string $commandInput)
    {
        $commandMaker = new CommandMaker();
        $this->commandsCollection = new CommandsCollection();

        $commands = str_split(trim($commandInput));

        foreach ($commands as $key => $value) {
            $this->commandsCollection->append($commandMaker->makeCommand($value));
        }
    }

    /**
     * Get commands collection
     *
     * @return CommandsCollection
     */
    public function getCommandsCollection()
    {
        return $this->commandsCollection;
    }
}
