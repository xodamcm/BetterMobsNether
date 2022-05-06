<?php

declare(strict_types=1);

namespace tgwaste\NetherMobs\Entities;
use pocketmine\entity\Living;
use pocketmine\item\Item;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\Player;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use function mt_rand;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\data\bedrock\EntityLegacyIds;

class Enderman extends MobsEntity {
	const TYPE_ID = EntityLegacyIds::ENDERMAN;
	const HEIGHT = 2.9;
    public function initEntity(CompoundTag $nbt) : void{
        $this->setMaxHealth(40);
	 $this->setMovementSpeed(1.3);
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
        return [
            VanillaItems::ENDER_PEARL()->setCount(mt_rand(0, 1 * $lootingL)),
        ];
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}
