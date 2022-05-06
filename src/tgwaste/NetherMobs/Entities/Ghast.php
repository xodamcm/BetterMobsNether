<?php

declare(strict_types=1);

namespace tgwaste\NetherMobs\Entities;
use pocketmine\entity\Living;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use function mt_rand;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\data\bedrock\EntityLegacyIds;

class Ghast extends MobsEntity {
	const TYPE_ID = EntityLegacyIds::GHAST;
	const HEIGHT = 4.0;
    public function initEntity(CompoundTag $nbt) : void{
        $this->setMaxHealth(12);
	 $this->setMovementSpeed(1);
        parent::initEntity($nbt);
    }
    public function getDrops(): array{
        $lootingL = 1;
        $cause = $this->lastDamageCause;
        if($cause instanceof EntityDamageByEntityEvent){
            $dmg = $cause->getDamager();
            if($dmg instanceof Player){
              
                // $looting = $dmg->getInventory()->getItemInHand()->getEnchantment(Enchantment::LOOTING);
                // if($looting !== null){
                    // $lootingL = $looting->getLevel();
                // }else{
                    $lootingL = 1;
            // }
            }
        }
        if(mt_rand(0, 1) == 1){
            $drops = [
                VanillaItems::GUNPOWDER()->setCount(mt_rand(0, 1 * $lootingL)),
            ];
        }else{
            $drops = [
                VanillaItems::GHAST_TEAR()->setCount(1 * $lootingL),
            ];
        }
        return $drops;
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}
