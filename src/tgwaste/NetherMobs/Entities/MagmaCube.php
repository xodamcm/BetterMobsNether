<?php

declare(strict_types=1);

namespace tgwaste\NetherMobs\Entities;
use pocketmine\entity\Living;
use pocketmine\item\Item;
use pocketmine\player\Player;
use function mt_rand;
use pocketmine\network\mcpe\protocol\types\entity\EntityMetadataCollection;
use pocketmine\network\mcpe\protocol\types\entity\EntityMetadataProperties;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\data\bedrock\EntityLegacyIds;

class MagmaCube extends MobsEntity {
	const TYPE_ID = EntityLegacyIds::MAGMA_CUBE;
	const HEIGHT = 1.0;
    public function initEntity(CompoundTag $nbt) : void{
        $this->setMaxHealth(10);
	$this->setMovementSpeed(1);
        $this->setVariant(mt_rand(0, 3));
        parent::initEntity($nbt);
    }
    public function getDrops(): array
    {
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
        return [VanillaItems::MAGMA_CREAM()->setCount(mt_rand(0, 1 * $lootingL))];
    }

    public function getXpDropAmount(): int
    {
        return mt_rand(1, 4);
    }

    
    public function setVariant(int $variant = 0): void {
		if($variant > 2 && $variant < 0){
			$variant = 0;
		}
		$this->variant = $variant;
		$this->networkPropertiesDirty = true;
	} 
	
    protected function syncNetworkData(EntityMetadataCollection $properties) : void{
		parent::syncNetworkData($properties);
		$properties->setInt(EntityMetadataProperties::VARIANT, $this->variant);
	}

}
