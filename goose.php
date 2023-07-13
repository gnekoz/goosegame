<?php

class Player {

    public function __construct( private string $name = 'unknown player') {
    }

    public function getName(): string {
        return $this->name;
    }

}

/**
 * 
 */
class Game {
    /**
     * 
     */
    private $players = [];

    /**
     * 
     */
    public function addPlayer(string $name): void {

        // Check if player exists
        if (in_array($name, $this->collectPlayersNames())) {
            $this->log("Player '$name' already exists");
            return;
        }

        $this->players[] = new Player($name);
        $this->log("current players: " . $this->extractPlayersName());
    }

    /**
     * @return string[]
     */
    public function collectPlayersNames(): array {
        return array_map(
            function(Player $player) {
                return $player->getName();
            },
            $this->players
        );
    }

    public function throwDice(): int {
        
    } 

    private function extractPlayersName(): string 
    {
        return implode(
            ', ',
            $this->collectPlayersNames()
        );
    }

    private function log(string $text): void {
        echo "> $text\n";
    }
}


echo "Welcome!\n";
// TODO print help

$game = new Game;

$gameRunning = true;
while ($gameRunning && ($input = readline()) !== null) {

    // TODO add a input parser class
    $tokens = explode(" ", $input);

    // TODO check minimum tokens

    switch ($tokens[0]) {
        case "add":
            $game->addPlayer($tokens[1]);
            break;
        case "quit":
            $gameRunning = false;
            break;
    }
}

echo "Game over!";