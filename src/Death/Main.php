<?php

declare(strict_types=1);

namespace Death;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\Player;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Main extends PluginBase implements Listener {
    
	/**
	* Called when the main plugin is first enabled.
	*/
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
	}

	/**
	* @param PlayerDeathEvent $event
	* return void
	* 
	* Called when a player dies.
	*/
	public function onDeath(PlayerDeathEvent $event){
	    	$damaged = $event->getEntity();
		if($damaged instanceof Player) {
			$lastDamageCause = $damaged->getLastDamageCause();
			if($lastDamageCause !== null && $lastDamageCause instanceof EntityDamageByEntityEvent) {
				$killer = $damaged->getDamager();
				if($killer instanceof Player) {
					$event->setDeathMessage("§c" . $player->getName() . "§b was killed by §c" . $killer->getName());
				}
			}
		}
	}
}
