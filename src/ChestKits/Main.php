<?php

declare(strict_types=1);

namespace ChestKits;

use pocketmine\block\Block;
use pocketmine\command\{Command, CommandSender};
use pocketmine\inventory\ChestInventory;
use pocketmine\item\{Item, ItemFactory};
use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase;
use pocketmine\nbt\{NBT, tag\CompoundTag, tag\IntTag, tag\ListTag, tag\StringTag};
use pocketmine\tile\{Tile, Chest};
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase {

    public function onEnable() : void {
        $this->getLogger()->info("ChestKits Enabled");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {

        if(!$sender instanceof Player){
            $sender->sendMessage(TextFormat::RED . "Command must be used in-game.");
            return true;
        }
        switch($command){
            case "starter":
                $helmet = Item::get(306, 0, 1);
                $helmet->setCustomName("Starter Helmet");
                $helmet->setLore("§b§lWalker III\n §r§7With this Helmet you Can Travel through\n Space and Time Travel With Walker 4 enchant");
                $chestplate = Item::get(307, 0, 1);
                $chestplate->setCustomName("Starter Chestplate");
                $leggings = Item::get(308, 0, 1);
                $leggings->setCustomName("Starter Leggings");
                $boots = Item::get(309, 0, 1);
                $boots->setCustomName("Ultimate Starter boots");
                $boots->setLore("§bThis Item is Ultimate As It Was touched By §dLegends §r§eBooks");
                $sword = Item::get(267, 0, 1);
                $sword->setCustomName("§eSword Of §7Creed");
                $sword->setLore("§7This Sword Is The Sword of Creed\n ment to be replacement of\n §eStarter §6Kit §7For §aCube§bX");
                $nbt = new CompoundTag("BlockEntityTag", [new ListTag("Items", [$helmet->nbtSerialize(0), $chestplate->nbtSerialize(1), $leggings->nbtSerialize(2), $boots->nbtSerialize(3), $sword->nbtSerialize(4)])]);
                $chest = ItemFactory::get(Block::CHEST, 0, 1);
                $chest->setNamedTagEntry($nbt);
                $chest->setCustomName("§l§d[§r§eStarter §6Kit§l§d]§r");
                $sender->getInventory()->addItem($chest);
                break;
        }
        switch($command){
            case "vip":
                $helmetvip = Item::get(310, 0, 1);
                $helmetvip = setCustomName("VIP Helmet");
                $helmetvip= setLore("§bA Test Plugin For CubeX");
                $nbt = new CompoundTag("BlockEntityTag" [new ListTag("Items", [$helmetvip->nbtSerialize(0)])]);
                $chest = ItemFactory;;get(Block::CHEST, 0, 1);
                $chest->setNameTagEntry($nbt);
                $chest->setCustomName("§l§d[§r§aVIP§l§d]§r§6 Rank §7[§cKIT§7]§r");
                $chest->setLore("§7This Is A Specialty Kit Especially For §l§d[§r§aVIP§l§d]§r §eRank\n §7Worth 1,000 cubits On the BlackMarket");
                $sender->getInventory()->addItem($chest);
                break;
        }
        return true; 
    }
}
