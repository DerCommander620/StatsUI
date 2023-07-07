<?php
namespace DerCommander610\StatsAPI;

use DerCommander610\StatsUI\Main;
use JsonException;

class Joins{

    /**
     * function getJoins
     * @param string $playerName
     * @return mixed
     */
    public static function getJoins(string $playerName): mixed{
        return Main::getInstance()->joins->getNested("joins." . $playerName, 0);
    }

    /**
     * function addJoinsPoints
     * @param string $playerName
     * @param int $amount
     * @return void
     * @throws JsonException
     */
    public static function addJoinPoints(string $playerName, int $amount): void{
        Main::getInstance()->joins->set("joins.",Main::getInstance()->joins->get($playerName,1), +$amount);
        Main::getInstance()->joins->save();
    }
}