<?php
namespace DerCommander610\StatsAPI;

use DerCommander610\StatsUI\Main;
use JsonException;

class Jumps{

    /**
     * function getJumps
     * @param string $playerName
     * @return mixed
     */
    public static function getJumps(string $playerName): mixed{
        return Main::getInstance()->jumps->getNested("jumps." . $playerName, 0);
    }

    /**
     * function addJumps
     * @param string $playerName
     * @param int $amount
     * @return void
     * @throws JsonException
     */
    public static function addJumpPoints(string $playerName, int $amount): void{
        Main::getInstance()->jumps->set("jumps.",Main::getInstance()->jumps->get($playerName,1), +$amount);
        Main::getInstance()->jumps->save();
    }
}