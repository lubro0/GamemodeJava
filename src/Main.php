<?php

declare(strict_types=1);

namespace gmjava\GamemodeJava;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class Main extends PluginBase{

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($sender instanceof Player && $sender->hasPermission("gm.use")) {
            switch ($command->getName()) {
                case "gm":
                    if (isset($args[0])) {
                        switch ($args[0]) {
                            case "1":
                                $sender->setGamemode(1);
                                break;
                            case "2":
                                $sender->setGamemode(0);
                                break;
                            case "3":
                                $sender->setGamemode(3);
                                break;
                        }
                    }
                    return true;
            }
        }
        return false;
    }
}
