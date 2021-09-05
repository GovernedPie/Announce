<?php

namespace announce;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class main extends PluginBase{
    public function onEnable(){
        $this->getLogger()->info("Announce enabled");
    }
    public function onLoad(){
        $this->getLogger()->info("Announce loading");
    }
    public function onDisable(){
        $this->getLogger()->info("Announce disabled");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        switch ($cmd->getName()){
            case "announce":
                if (!$sender->isOp()){
                    $sender->sendMessage(TextFormat::RED . "You dont have permission to use this command!");
                    return false;
                }
                $msg = implode(" ", $args);
                $this->getServer()->broadcastMessage(TextFormat::RED . "[Broadcast] " . TextFormat::WHITE . "$msg");
        }
        return true;
    }
}