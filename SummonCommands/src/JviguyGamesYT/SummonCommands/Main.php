<?php

declare(strict_types=1);

namespace JviguyGamesYT\SummonCommands;

use czechpmdevs\multiworld\generator\normal\biome\Plains;
use pocketmine\block\SnowLayer;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginManager;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use revivalpmmp\pureentities\entity\animal\swimming\Tropicalfish;
use tokyo\pmmp\Texter\text\Text;
use JviguyGamesYT\SummonCommands;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(Textformat::AQUA . "Summon Commands By JviguyGamesYT Have been enabled!");
        EntityManager::init();
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()) {
            case "summon":
                if ($sender->isOp()) {
                    $entitylist = array("entity_list", "bat", "bee","blaze","cave_spider","chicken","cow","creeper","donkey","elder_guardian","endermen","endermite","evoker","fox","ghast","guardian","horse","husk","iron_golem","llama","magma_cube","mooshroom","mule","ocelot","panda","parrot","pig","zombie_pigman","polar_bear","rabbit","ravager","sheep","shulker","silverfish","skeleton","slime","snow_golem","spider","stray","vex","vindicator","witch","wither_skeleton","wolf","zombie","zombie_villager");
                    if (empty($args)) {
                        $sender->sendMessage(TextFormat::RED . "Usage: /summon (entities_name or entity_list for a list of all spawnable entities) (@p or @s or A Players Name!)");
                        return false;
                    }
                    if (in_array($args[0], $entitylist)) {
                        if ($args[0] === "iron_golem") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $irongolem = new IronGolem($pos->getLevel(), IronGolem::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $irongolem->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $irongolem = new IronGolem($pos->getLevel(), IronGolem::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $irongolem->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }

                            }
                        }
                        if ($args[0] === "skeleton") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $skeleton = new Skeleton($pos->getLevel(), Skeleton::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $skeleton->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $skeleton = new Skeleton($pos->getLevel(), Skeleton::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $skeleton->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "bee") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $bee = new Bee($pos->getLevel(), Bee::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $bee->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $bee = new Bee($pos->getLevel(), Bee::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $bee->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "bat") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $bat = new Bat($pos->getLevel(), Bat::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $bat->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $bat = new Bat($pos->getLevel(), Bat::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $bat->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "blaze") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $blaze = new Blaze($pos->getLevel(), Blaze::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $blaze->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $blaze = new Blaze($pos->getLevel(), Blaze::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $blaze->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "cave_spider") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $cavespider = new CaveSpider($pos->getLevel(), CaveSpider::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $cavespider->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $cavespider = new CaveSpider($pos->getLevel(), CaveSpider::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $cavespider->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "chicken") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $chicken = new Chicken($pos->getLevel(), Chicken::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $chicken->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $chicken = new Chicken($pos->getLevel(), Chicken::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $chicken->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "cow") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $cow = new Cow($pos->getLevel(), Cow::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $cow->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $cow = new Cow($pos->getLevel(), Cow::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $cow->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "creeper") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $creeper = new Creeper($pos->getLevel(), Creeper::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $creeper->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $creeper = new Creeper($pos->getLevel(), Creeper::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $creeper->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "donkey") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $donkey = new Donkey($pos->getLevel(), Donkey::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $donkey->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $donkey = new Donkey($pos->getLevel(), Donkey::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $donkey->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "elder_guardian") {
                        $server = $sender->getServer();
                        $sendersname = $sender->getName();
                        if (empty($args[1])) {
                            $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                            return false;
                        }
                        if ($args[1] !== "@p" && $args[1] !== "@s") {
                            $name = $args[1];
                            $playerbeingexecutedat = $server->getPlayer($name);
                            if ($playerbeingexecutedat === null) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                return false;
                            } else {
                                $pos = $playerbeingexecutedat;
                                $elderguardian = new ElderGuardian($pos->getLevel(), ElderGuardian::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                $elderguardian->spawnTo($playerbeingexecutedat);
                                $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                return false;
                            }
                        } else {
                            if ($sender instanceof Player) {
                                $sendersname = $sender->getName();
                                $ats = $server->getPlayer($sendersname);
                                $pos = $ats->getPosition();
                                $elderguardian = new ElderGuardian($pos->getLevel(), ElderGuardian::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                $elderguardian->spawnTo($ats);
                                $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                return false;
                            } else {
                                $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                return false;
                                }
                            }
                        }
                        if ($args[0] === "endermen") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $enderman = new Enderman($pos->getLevel(), Enderman::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $enderman->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $enderman = new Enderman($pos->getLevel(), Enderman::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $enderman->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "endermite") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $endermite = new Endermite($pos->getLevel(), Endermite::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $endermite->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $endermite = new Endermite($pos->getLevel(), Endermite::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $endermite->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "evoker") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $evoker = new Evoker($pos->getLevel(), Evoker::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $evoker->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $evoker = new Evoker($pos->getLevel(), Evoker::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $evoker->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "fox") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $fox = new Fox($pos->getLevel(), Fox::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $fox->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $fox = new Fox($pos->getLevel(), Fox::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $fox->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "ghast") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $ghast = new Ghast($pos->getLevel(), Ghast::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $ghast->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $ghast = new Ghast($pos->getLevel(), Ghast::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $ghast->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "guardian") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $guardian = new Guardian($pos->getLevel(), Guardian::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $guardian->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $guardian = new Guardian($pos->getLevel(), Guardian::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $guardian->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "horse") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $horse = new Horse($pos->getLevel(), Horse::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $horse->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $horse = new Horse($pos->getLevel(), Horse::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $horse->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "husk") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $husk = new Husk($pos->getLevel(), Husk::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $husk->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $husk = new Husk($pos->getLevel(), Husk::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $husk->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "llama") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $llama = new Llama($pos->getLevel(), Llama::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $llama->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $llama = new Llama($pos->getLevel(), Llama::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $llama->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "magma_cube") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $magmacube = new MagmaCube($pos->getLevel(), MagmaCube::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $magmacube->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $magmacube = new MagmaCube($pos->getLevel(), MagmaCube::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $magmacube->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "mooshroom") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $m = new Mooshroom($pos->getLevel(), Mooshroom::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $m->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $m = new Mooshroom($pos->getLevel(), Mooshroom::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $m->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "mule") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $mule = new Mule($pos->getLevel(), Mule::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $mule->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $mule = new Mule($pos->getLevel(), Mule::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $mule->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "ocelot") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $o = new Ocelot($pos->getLevel(), Ocelot::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $o->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $o = new Ocelot($pos->getLevel(), Ocelot::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $o->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "panda") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $pa = new Panda($pos->getLevel(), Panda::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pa->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $pa = new Panda($pos->getLevel(), Panda::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pa->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "parrot") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $pr = new Parrot($pos->getLevel(), Parrot::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pr->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $pr = new Parrot($pos->getLevel(), Parrot::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pr->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "pig") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $pig = new Pig($pos->getLevel(), Pig::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pig->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $pig = new Pig($pos->getLevel(), Pig::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pig->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "zombie_pigman") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $pgm = new PigZombie($pos->getLevel(), PigZombie::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pgm->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $pgm = new PigZombie($pos->getLevel(), PigZombie::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pgm->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "polar_bear") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $prb = new PolarBear($pos->getLevel(), PolarBear::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $prb->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $prb = new PolarBear($pos->getLevel(), PolarBear::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $prb->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "rabbit") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $rab = new Rabbit($pos->getLevel(), Rabbit::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $rab->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $rab = new Rabbit($pos->getLevel(), Rabbit::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $rab->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "ravager") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $rav = new Ravager($pos->getLevel(), Ravager::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $rav->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $rav = new Ravager($pos->getLevel(), Ravager::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $rav->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "parrot") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $pr = new parrot($pos->getLevel(), Parrot::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pr->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $pr = new Parrot($pos->getLevel(), Parrot::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $pr->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "sheep") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $sheep = new Sheep($pos->getLevel(), Sheep::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $sheep->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $sheep = new Sheep($pos->getLevel(), Sheep::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $sheep->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "shulker") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $sh = new Shulker($pos->getLevel(), Shulker::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $sh->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $sh = new Shulker($pos->getLevel(), Shulker::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $sh->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "silverfish") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $slv = new Silverfish($pos->getLevel(), SilverFish::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $slv->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $slv = new Silverfish($pos->getLevel(), Silverfish::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $slv->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "slime") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $sl = new Slime($pos->getLevel(), Slime::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $sl->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $sl = new Slime($pos->getLevel(), Slime::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $sl->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "snow_golem") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $snowgolem = new SnowGolem($pos->getLevel(), SnowGolem::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $snowgolem->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $snowgolem = new SnowGolem($pos->getLevel(), SnowGolem::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $snowgolem->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "spider") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $sp = new Spider($pos->getLevel(), Spider::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $sp->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $sp = new Spider($pos->getLevel(), Spider::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $sp->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "stray") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $st = new Stray($pos->getLevel(), Stray::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $st->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $st = new Stray($pos->getLevel(), Stray::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $st->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "vex") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $vex = new Vex($pos->getLevel(), Vex::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $vex->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $vex = new Vex($pos->getLevel(), Vex::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $vex->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "vindicator") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $vindi = new Vindicator($pos->getLevel(), Vindicator::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $vindi->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $vindi = new Vindicator($pos->getLevel(), Vindicator::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $vindi->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "witch") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $wi = new Witch($pos->getLevel(), Witch::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $wi->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $wi = new Witch($pos->getLevel(), Witch::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $wi->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "wither_skeleton") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $ws = new WitherSkeleton($pos->getLevel(), WitherSkeleton::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $ws->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $ws = new WitherSkeleton($pos->getLevel(), WitherSkeleton::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $ws->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "wolf") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $wo = new Wolf($pos->getLevel(), Wolf::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $wo->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $wo = new Wolf($pos->getLevel(), Wolf::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $wo->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "zombie") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $z = new Zombie($pos->getLevel(), Zombie::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $z->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $z = new Zombie($pos->getLevel(), Zombie::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $z->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "zombie_villager") {
                            $server = $sender->getServer();
                            $sendersname = $sender->getName();
                            if (empty($args[1])) {
                                $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Please Put @p or @s Or A Players Name!");
                                return false;
                            }
                            if ($args[1] !== "@p" && $args[1] !== "@s") {
                                $name = $args[1];
                                $playerbeingexecutedat = $server->getPlayer($name);
                                if ($playerbeingexecutedat === null) {
                                    $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Make Sure The Player That You Are Summoning A entity at Is Online!");
                                    return false;
                                } else {
                                    $pos = $playerbeingexecutedat;
                                    $zv = new ZombieVillager($pos->getLevel(), ZombieVillager::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $zv->spawnTo($playerbeingexecutedat);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$name}");
                                    return false;
                                }
                            } else {
                                if ($sender instanceof Player) {
                                    $sendersname = $sender->getName();
                                    $ats = $server->getPlayer($sendersname);
                                    $pos = $ats->getPosition();
                                    $zv = new ZombieVillager($pos->getLevel(), ZombieVillager::createBaseNBT($pos, new \pocketmine\math\Vector3(0, 0, 0)));
                                    $zv->spawnTo($ats);
                                    $sender->sendMessage(TextFormat::GREEN . TextFormat::ITALIC . TextFormat::BOLD . "{$args[0]} Has Been Summoned At {$sendersname}");
                                    return false;
                                } else {
                                    $sender->sendMessage(TextFormat::RED . "If You Are Going To Spawn An Entity At Your Self Please Be In The Game.");
                                    return false;
                                }
                            }
                        }
                        if ($args[0] === "entity_list") {
                            $sender->sendMessage(Textformat::AQUA. "This List Is Case Sensitive To Spawn That Said Entity Please Use The Exact Name From This List. Entities:bat, bee, blaze, cave_spider, chicken, cow, creeper, donkey, elder_guardian, endermen, endermite, evoker, fox, ghast, guardian, horse, husk, iron_golem, llama, magma_cube, mooshroom, mule, ocelot, panda, parrot, pig, zombie_pigman, polar_bear, rabbit, ravager, sheep, shulker, silverfish, skeleton, slime, snow_golem, spider, stray, vex, vindicator, witch, wither_skeleton, wolf, zombie, zombie_villager");
                            return false;
                        }
                } else {
        $sender->sendMessage(TextFormat::RED . TextFormat::BOLD . TextFormat::ITALIC . "Not All Entities Are In My Summon Command Please Make Sure That You Have Put A Entity That Is Done!");
        return false;
    }
                } else {
                    $sender->sendMessage(TextFormat::RED.TextFormat::ITALIC."You Do Not Have The Required Permission To Use This Command.");
                }

        }
        return true;
    }
}
