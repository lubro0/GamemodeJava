<?php

declare(strict_types=1);

namespace gmjava\GamemodeJava;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\player\GameMode;

class Main extends PluginBase{

    public function onEnable(): void {
        $this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("gamemode"));
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($sender instanceof Player && $sender->hasPermission("gm.use")) {
            if ($command->getName() === "gm") {
                if (isset($args[0])) {
                    switch ($args[0]) {
                        case "1":
                            $sender->setGamemode(GameMode::CREATIVE());
                            return true;
                        case "2":
                            $sender->setGamemode(GameMode::SURVIVAL());
                            return true;
                        case "3":
                            $sender->setGamemode(GameMode::SPECTATOR());
                            return true;
                        default:
                            $sender->sendMessage("§cInvalid Gamemode!");
                            return true;
                    }
                }
            }
        }
        return false;
    }
}
