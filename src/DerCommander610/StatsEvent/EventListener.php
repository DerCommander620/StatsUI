<?php
namespace DerCommander610\StatsEvent;

use DerCommander610\StatsAPI\Deaths;
use DerCommander610\StatsAPI\Joins;
use DerCommander610\StatsAPI\Jumps;
use DerCommander610\StatsAPI\Kicks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerJumpEvent;
use pocketmine\event\player\PlayerKickEvent;

class EventListener implements Listener{

    public function onJoin(PlayerJoinEvent $event){
        Joins::addJoinPoints($event->getPlayer(), 1);
    }

    public function onJump(PlayerJumpEvent $event){
        Jumps::addJumpPoints($event->getPlayer(), 1);
    }

    public function onKick(PlayerKickEvent $event){
        Kicks::addKickPoints($event->getPlayer(), 1);
    }

    public function onDeath(PlayerDeathEvent $event){
        Deaths::addDeathPoints($event->getPlayer(), 1);
    }
}