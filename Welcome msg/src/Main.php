<?php

namespace Welcome msg;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;

class main extends PluginBase implements Listener {
    public function onEnable()
    {
        $this->getLogger()->info("Le Plugin started");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }


    public function onDisable()
    {
        $this->getLogger()->info("Le Plugin disable");
    }

    public function onJoin(PLayerJoinEvent $event){
        $player = $event->getPlayer();
        $event->setJoinMessage(joinMessage: " ");

        if(!$player->hasPlayedBefore()){
          $player ->sendMessage("NOUVEAU");
          Server: :getInstance()->broadcastMessage( message: "§eCe nouveau joueur : §6". $player->getName() . " §eest nouveau sur le serveur !");
        }else{
            $player->sendMessage("ANCIEN");
            Server: :getInstance()->broadcastMessage( message: "§6" . $player->getName() . " §eTe revoilà ! Bon retour parmis Nous !");
        }
    }

    public function onLeave(PlayerLeaveEvent $event){
        $player = $event ->getPlayer();

        $event->setLeaveMessage( leaveMessage: " ");
        Server: :getInstance()->broadcastMessage( message: "§6" . $player->getName() . "§e Quitte le serveur à bientôt !");
    }
}
