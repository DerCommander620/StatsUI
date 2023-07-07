<?php
namespace DerCommander610\StatsUI;

use DerCommander610\StatsAPI\Deaths;
use DerCommander610\StatsAPI\Joins;
use DerCommander610\StatsAPI\Jumps;
use DerCommander610\StatsAPI\Kicks;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
    use SingletonTrait;

    public Config $jumps;
    public Config $joins;
    public Config $kicks;
    public Config $deaths;

    public function onEnable(): void{
        self::setInstance($this);
        $jumps = new Config($this->getDataFolder() . "jumps.json", Config::JSON);
        $joins = new Config($this->getDataFolder() . "joins.json", Config::JSON);
        $kicks = new Config($this->getDataFolder() . "kicks.json", Config::JSON);
        $deaths = new Config($this->getDataFolder() . "deaths.json", Config::JSON);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        switch($command->getName()){
            case "stats":
                $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
                $form = $api(new CustomForm(function(Player $sander, int $data = null){
                    if ($data === null) {
                        return true;
                    }
                    $player = Server::getInstance()->getPlayerExact($data([0]));;
                    if(!$player instanceof Player){
                        $sander->sendMessage("§cThis Player doesnt Exists!");
                    }else{
                        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
                        $form = $api(new CustomForm(function(Player $sander, int $data = null){
                            if($data === null){
                                return true;
                            }
                        }));
                        $form->setTitle($player . "'s Stats:");
                        $form->setContent("§aJumps: " . Jumps::getJumps($player) . "\nJoins: " . Joins::getJoins($player) . "\nKicks: " . Kicks::getKicks($player) . "\nDeaths: " . Deaths::getDeaths($player));
                        $form->sendToPlayer($sander);
                        return $form;
                    }
                }));
                $form->setTitle("§aStatsUI");
                $form->addInput(TextFormat::BLUE . ">" . TextFormat::LIGHT_PURPLE . ">" . TextFormat::GREEN . " Please enter a PlayerName!");
                $form->sendToPlayer($sender);
                return $form;
        }
    return true;    
    }
}
