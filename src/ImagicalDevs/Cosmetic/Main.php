<?php

Namespace ImagicalDevs\Cosmetic;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\network\protocol\UseItemPacket;
Use pocketmine\math\Vector3;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\level\particle\RedstoneParticle;
use pocketmine\utils\Config;
use pocketmine\level\Level;
use pocketmine\level\particle\HugeExplodeParticle;
use pocketmine\level\particle\WaterParticle;
use pocketmine\level\particle\AngryVillagerParticle;

Class Main extends PluginBase implements Listener{
       
     public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§aCosmeticMenu by ImagicalDevs loaded ;D!");
        }
public function onPacketReceived(DataPacketReceiveEvent $event){
            $pk = $event->getPacket();
            $player = $event->getPlayer();
            if($pk instanceof UseItemPacket and $pk->face === 0xff) {
             $block = $player->getLevel()->getBlock($player->floor()->subtract(0, 1));
            $item = $player->getInventory()->getItemInHand();
            $pos = new Vector3($player->getX(), $player->getY() + 1, $player->getZ());
            $particle = new RedstoneParticle($pos, 5);  
            $particle2 = new HugeExplodeParticle($pos, 5);
            $particle3 = new WaterParticle($pos, 5);
            $particle = new AngryVillagerParticle($pos, 5);
            $level = $player->getLevel();
if($item->getId() == 341){
     $level->addParticle($particle);
     $level->addParticle($particle2);
     $level->addParticle($particle3);
     $level->addParticle($particle4);
   }
  }
 }
	public function onPlayerItemHeldEvent(PlayerItemHeldEvent $e){
		$i = $e->getItem();
		$p = $e->getPlayer();
			if($i->getId() == 341){
     $p->sendPopup("§eParticle§dBomb");
  }
 }
}
