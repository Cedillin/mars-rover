<?php

namespace App\Models\Rover;

use App\Models\Command\CommandsCollection;

class Rover
{
    private $setup;
    private $commands;

    /**
     * Get Rover initial setup
     *
     * @return RoverSetup
     */
    public function getSetup(): RoverSetup
    {
        return $this->setup;
    }

    /**
     * Set Rover commands
     *
     * @param CommandsCollection $commands
     * @return void
     */
    public function setCommands(CommandsCollection $commands): void
    {
        $this->commands = $commands;
        return;
    }

    /**
     * Set Rover SETUP
     *
     * @param RoverSetup $roverSetup
     * @return void
     */
    public function setSetup(RoverSetup $roverSetup): void
    {
        $this->setup = $roverSetup;
        return;
    }

    /**
     * Execute Rover commands
     *
     * @return void
     */
    public function execute(): void
    {
        $iterator = $this->commands->getIterator();

        $iterator->rewind();

        while ($iterator->valid()) {
            $command = $iterator->current();
            $command->execute($this);
            $iterator->next();
        }

        return;
    }

    /**
     * Translate setup commands to string
     *
     * @return string
     */
    public function getSetupAsString(): string
    {
        return $this->setup->toString();
    }
}
