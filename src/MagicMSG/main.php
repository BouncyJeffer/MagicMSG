<?php
namespace MagicMSG;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
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
			case "warn":
			if($args[1] == "types"){
				$sender->sendMessage(TextFormat::YELLOW."Warn types: ".TextFormat::RED."cuss, spam, advertise, rude, threat and hack.");
				die;
			}
			$player = $this->getServer()->getPlayer($args[1]);
			if($player instanceof Player){
				switch($args[2]){
					case "cuss":
					case "foul language":
					case "inappropriate language":
					case "swear":
					$sender->sendMessage(TextFormat::RED.$arg[1]." was warned for inappropriate language.");
					$player->sendMessage(TextFormat::RED."You have been warned by ".TextFormat::YELLOW.$sender->getName().TextFormat::RED." 
					for inappropriate language.");
					break;
					case "spam":
					$sender->sendMessage(TextFormat::RED.$args[1]." was warned for spamming.");
					$player->sendMessage(TextFormat::RED."You have been warned by ".TextFormat::YELLOW.$sender->getName().TextFormat::RED." 
					for spamming.");
					break;
					case "advertise":
					$sender->sendMessage(TextFormat::RED.$args[1]." was warned for advertising.");
					$player->sendMessage(TextFormat::RED."You have been warned by ".TextFormat::YELLOW.$sender->getName().TextFormat::RED." 
					for advertising.");
					break;
					case "rude":
					$sender->sendMessage(TextFormat::RED.$args[1]." was warned for offensive behavior.");
					$player->sendMessage(TextFormat::RED."You have been warned by ".TextFormat::YELLOW.$sender->getName().TextFormat::RED." 
					for offensive behavior.");
					break;
					case "threat":
					$sender->sendMessage(TextFormat::RED.$args[1]." was warned for threatening.");
					$player->sendMessage(TextFormat::RED."You have been warned by ".TextFormat::YELLOW.$sender->getName().TextFormat::RED." 
					for threatening.");
					break;
					case "hacking":
					$sender->sendMessage(TextFormat::RED.$args[1]." was warned for the use of client modifications.");
					$player->sendMessage(TextFormat::RED."You have been warned by ".TextFormat::YELLOW.$sender->getName().TextFormat::RED." 
					for the use of client modifications, please turn them off.");
					break;
					default:
					$sender->sendMessage(TextFormat::RED."Error: Unknown warn type.");
					break;
				}
			} else {
				$sender->sendMessage(TextFormat::RED."Error: Player not found.");
			}
			break;
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
			case "help":
			$sender->sendMessage(TextFormat::YELLOW."Send message or popup: /magicmsg <message|popup> <player> <message> \n
			Send message or popup to all: /magicmsg <msg|popup> all <message>\n
			You can find me on twitter ".TextFormat::RED."@bouncyjeffer".TextFormat::YELLOW." if you need help.");
			break;	
			case "version":
			$sender->sendMessage(TextFormat::YELLOW."This server is running version 1.0.0 of MagicMSG by BouncyJeffer. Twitter.com/BouncyJeffer");
			break;
			default:
			$sender->sendMessage(TextFormat::RED."Error: Unknown sub-command. Try ".TextFormat::GREEN."/magicmsg help".TextFormat::RED." for help.");
			break;
		}
	}
	return true;
    }
}
?>
