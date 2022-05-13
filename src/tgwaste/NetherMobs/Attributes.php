<?php

declare(strict_types=1);

namespace tgwaste\NetherMobs;

class Attributes {
	public function isFlying(string $name) : bool {
		return in_array($name, ["Blaze", "Ghast"]);
	}

	public function isJumping(string $name) : bool {
		return in_array($name, ["MagmaCube"]);
	}

	public function isHostile(string $name) : bool {
		return in_array($name, [
			"Blaze", "Ghast", "MagmaCube", "ZombiePigman", "Enderman", "Skeleton", "WitherSkeleton", "Piglin", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"
		]);
	}

	public function isNetherMob(string $name) : bool {
		return in_array($name, ["Blaze", "Ghast", "Enderman", "Ghast", "MagmaCube", "Skeleton", "WitherSkeleton", "Strider", "Piglin", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"]);
	}
	
	public function isFireProof(string $name) : bool {
		return in_array($name, [
			"Blaze", "Ghast", "MagmaCube", "ZombiePigman", "WitherSkeleton", "Piglin", "Strider", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"
		]);
	}
	
	public function getMortalEnemy(string $name) : string {
		$enemies = array();
		foreach ($enemies as $source => $target) {
			if ($source === $name) {
				return $target;
			}
		}
		return "none";
	}
}
