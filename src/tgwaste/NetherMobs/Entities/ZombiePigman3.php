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

class ZombiePigman3 extends MobsEntity {
	const TYPE_ID = EntityLegacyIds::ZOMBIE_PIGMAN;
	const HEIGHT = 1.95;
    public function initEntity(CompoundTag $nbt) : void{
        $this->setMaxHealth(20);
	 $this->setMovementSpeed(1.2);
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
        $drops = [
            VanillaItems::GOLD_NUGGET()->setCount(mt_rand(0, 1 * $lootingL)),
            VanillaItems::ROTTEN_FLESH()->setCount(mt_rand(0, 1 * $lootingL)),
        ];

        if(mt_rand(1, 200) <= 7){
            $drops[] = VanillaItems::GOLD_INGOT()->setCount(1 * $lootingL);
        }
        return $drops;
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}
