<?php
namespace DerCommander610\StatsAPI;

use DerCommander610\StatsUI\Main;
use JsonException;

class Kicks{

    /**
     * function getKicks
     * @param string $playerName
     * @return mixed
     */
    public static function getKicks(string $playerName): mixed{
        return Main::getInstance()->kicks->getNested("kicks." . $playerName, 0);
    }

    /**
     * function addKickPoints
     * @param string $playerName
     * @param int $amount
     * @return void
     * @throws JsonException
     */
    public static function addKickPoints(string $playerName, int $amount): void{
        Main::getInstance()->kicks->set("kicks.",Main::getInstance()->kicks->get($playerName,1), +$amount);
        Main::getInstance()->kicks->save();
    }
}