<?php

namespace OmegaDevFlo\SuperGMUI;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\listener;

class Main extends PluginBase implements Listener
{

    public function onEnable()
    {
        $this->getLogger()->info("§l§4Ela§fArmy§r >> §cPlugin wurde geladen");
    }


    public function onDisable()
    {
        $this->getLogger()->info("§l§4Ela§fArmy §r>> §cPlugin wurde deaktiviert");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {

        switch ($cmd->getName()) {
            case "gmui":
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("gmui.cmd")) {
                        $this->SimpleForm($sender);
                    }
                } else {
                    $sender->sendMessage("§l§4Ela§fArmy §r>> §cDas ist nur Ingame möglich.");
                }
                break;
        }
        return true;
    }

    public function SimpleForm($player)
    {
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $player, int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0;
                    $player->setGamemode(0);
                    $player->sendMessage("§l§6SuperGMUI >> §eYou are now in §fGamemode 1 ");
                    break;
                case 1;
                    $player->setGamemode(1);
                    $player->sendMessage("§l§6SuperGMUI >> §eYou are now in §fGamemode 1 ");
                    break;
                case 2;
                    $player->setGamemode(2);
                    $player->sendMessage("§l§6SuperGMUI >> §eYou are now in §fGamemode 2 ");
                    break;
                case 3;
                    $player->setGamemode(3);
                    $player->sendMessage("§l§6SuperGMUI >> §eYou are now in §fGamemode 3 ");
                    break;




            }
        });
        $form->setTitle("§3>§aServerinfo§3<");
        $form->setContent("§aGamemodeUI by §fOmegaDevFlo.");
        $form->addButton("§c>§fGamemode-0§c<§r");
        $form->addButton("§c>§fGamemode-1§c<§r");
        $form->addButton("§c>§fGamemode-2§c<§r");
        $form->addButton("§c>§fGamemode-3§c<§r");
        $form->sendToPlayer($player);
        return $form;
    }
}