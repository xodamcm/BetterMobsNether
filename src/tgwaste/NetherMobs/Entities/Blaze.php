<?php

declare(strict_types=1);

namespace tgwaste\NetherMobs\Entities;

use pocketmine\entity\Living;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use pocketmine\item\enchantment\VanillaEnchantments;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use function mt_rand;
use pocketmine\data\bedrock\EntityLegacyIds;

class Blaze extends MobsEntity {
	const TYPE_ID = EntityLegacyIds::BLAZE;
	const HEIGHT = 1.8;

    public function getDrops(): array{
        $lootingL = 1;
        $cause = $this->lastDamageCause;
        if($cause instanceof EntityDamageByEntityEvent){
            $dmg = $cause->getDamager();
            if($dmg instanceof Player){

                // $looting = $dmg->getInventory()->getItemInHand()->getEnchantment(VanillaEnchantments::LOOTING()); // todo
                // if($looting !== null){
                    // $lootingL = $looting->getLevel();
                // }else{
                    $lootingL = 1;
				// }
            }
        }
        return [VanillaItems::BLAZE_ROD()->setCount(mt_rand(0, 1 * $lootingL))];
    }

    public function getXpDropAmount(): int
    {
        return 10;
    }

}
