<?php
namespace MagicMSG;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Comand;
use pocketmine\utils\TextFormat;
class main extends PluginBase {
    public function onLoad(){
    	$this->getLogger()->info(TextFormat::AQUA."loading...");
    }
    public function onEnable(){
    	$this->getLogger()->info(TextFormat::GREEN."has been loaded.");
    }
    public function onDisable(){
    	$this->getLogger()->info(TextFormat::RED."has been disabled.");
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
   	if(strtolower($command->getName()) == "magicmw"){
		switch(strtolower($args[0])){
			case "msg":
			if(strtolower($arg[1]) == "all"){
				$players = $this->getServer()->getOnlinePlayers();
				$sender->sendMessage(TextFormat::GREEN."Sending...");
				foreach($players as $p){
					$p->sendMessage(substr(implode(" ", $args), 6));	
				}
				die;
			}
			$player = $this->getServer()->getPlayer($args[0]);
			if($player instanceof Player){
				$player->sendMessage(substr(implode(" ", $args), strlen($args[1]) + 3));
				$sender->sendMessage(TextFormat::GREEN."Message sent!");
			} else {
				$sender->sendMessage(TextFormat::RED."Error: Player not found.");
			}
			break;
			case "popup":
			if(strtolower($arg[1]) == "all"){
				$players = $this->getServer()->getOnlinePlayers();
				$sender->sendMessage(TextFormat::GREEN."Sending...");
				foreach($players as $p){
					$p->sendPopup(substr(implode(" ", $args), 8));	
				}
				die;
			}
			$player = $this->getServer()->getPlayer($args[0]);
			if($player instanceof Player){
				$player->sendPopup(substr(implode(" ", $args), strlen($args[1]) + 5));
				$sender->sendMessage(TextFormat::GREEN."Popup sent!");
			} else {
				$sender->sendMessage(TextFormat::RED."Error: Player not found.");	
			}
			break;
		}
	}
	return true;
    }
}
?>
