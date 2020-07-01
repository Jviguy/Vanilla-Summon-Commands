<?php

namespace JviguyGamesYT\SummonCommands;

use pocketmine\entity\Monster;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use function mt_rand;

class Skeleton extends Monster {

    public const NETWORK_ID = self::SKELETON;

    public $height = 1.99;
    public $width = 0.6;

    public function getName(): string{
        return "Skeleton";
    }

    public function getDrops(): array{
        $lootingL = 1;
        $cause = $this->lastDamageCause;
        if($cause instanceof EntityDamageByEntityEvent){
            $dmg = $cause->getDamager();
            if($dmg instanceof Player){
              
                $looting = $dmg->getInventory()->getItemInHand()->getEnchantment(Enchantment::LOOTING);
                if($looting !== null){
                    $lootingL = $looting->getLevel();
                }else{
                    $lootingL = 1;
            }
            }
        }
        return [
            Item::get(Item::ARROW, 0, mt_rand(0, 2 * $lootingL)),
            Item::get(Item::BONE, 0, mt_rand(0, 2 * $lootingL)),
        ];
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}