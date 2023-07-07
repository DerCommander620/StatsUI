<?php
namespace DerCommander610\StatsAPI;

use DerCommander610\StatsUI\Main;

class Deaths{

    /**
     * function getDeaths
     * @param string $playerName
     * @return mixed
     */
    public static function getDeaths(string $playerName): mixed{
        return Main::getInstance()->deaths->getNested("deaths." . $playerName, 0); 
    }

    /**
     * function addDeath
     * @param string $playerName
     * @param int $amount
     * @return void
     * @throws JsonException
     */
    public static function addDeathPoints(string $playerName, int $amount): void{
        Main::getInstance()->deaths->set("deaths.",Main::getInstance()->deaths->get($playerName,1), +$amount);
        Main::getInstance()->deaths->save();
    }
}    