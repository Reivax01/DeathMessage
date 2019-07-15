<?php

namespace Death;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\Player;

use pocketmine\event\player\PlayerDeathEvent;

class Main extends PluginBase implements Listener {
    
    
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
	}
	public function onDeath(PlayerDeathEvent $event){
	    $player = $event->getEntity();
        $killer = $player->getLastDamageCause()->getDamager();
        $event->setDeathMessage("§c" . $player->getName() . "§b was killed by §c" . $killer->getName());
	}
}