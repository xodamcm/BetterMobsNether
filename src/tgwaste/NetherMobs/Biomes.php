<?php

declare(strict_types=1);

namespace tgwaste\NetherMobs;

use pocketmine\data\bedrock\BiomeIds;
use pocketmine\player\Player;

class Biomes {
	public function getMobsForBiome(string $biome) {
		$biome = strtoupper($biome);
		$biometable = [
			"BIRCH FOREST" => ["Strider", "Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Piglin", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"DESERT" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Strider", "Piglin", "Hoglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"END" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Enderman", "WitehrSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"FOREST" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Strider", "Piglin", "Hoglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"HELL" => ["Blaze", "ZombiePigman", "MagmaCube", "Skeleton", "Enderman", "Ghast", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"ICE PLAINS" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"MOUNTAINS" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "WitherSkeleton", "Skeleton", "Enderman", "Piglin", "Strider", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			//"OCEAN" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "WitherSkeleton", "Enderman", "Skeleton"],
			"PLAINS" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Piglin", "Hoglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			//"RIVER" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast"],
			"SMALL MOUNTAIN" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "WitherSkeleton", "Enderman", "Skeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"SWAMP" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "WitherSkeleton", "Enderman", "Skeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"TAIGA" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Enderman", "WitherSkeleton", "Skeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"]
		];

		if (!array_key_exists($biome, $biometable)) {
			$biome = "PLAINS";
		}

		return $biometable[$biome];
	}

	public function getNightMobsForBiome(string $biome) {
		$biome = strtoupper($biome);
		$biometable = [
			"BIRCH FOREST" => ["Piglin", "Strider", "Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"DESERT" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"END" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"FOREST" => ["Piglin", "Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Strider", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"HELL" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"ICE PLAINS" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"MOUNTAINS" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			//"OCEAN" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton"],
			"PLAINS" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			//"RIVER" => [],
			"SMALL MOUNTAIN" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Piglin", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"SWAMP" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
			"TAIGA" => ["Blaze", "MagmaCube", "ZombiePigman", "Ghast", "Skeleton", "Enderman", "WitherSkeleton", "Hoglin", "Piglin", "Strider", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"],
		];

		if (!array_key_exists($biome, $biometable)) {
			$biome = "PLAINS";
		}

		return $biometable[$biome];
	}
}
