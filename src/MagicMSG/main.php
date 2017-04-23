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
			case "sendmsg":
			$player = $this->getServer()->getPlayer($args[0]);
			if($player instanceof Player){
				$player->sendMessage(substr(implode(" ", $args), strlen($args[1]) + 7));
				$sender->sendMessage(TextFormat::GREEN."Message sent!");
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
