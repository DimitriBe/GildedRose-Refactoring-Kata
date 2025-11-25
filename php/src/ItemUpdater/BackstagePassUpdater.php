<?php

namespace GildedRose\ItemUpdater;

use GildedRose\Item;

class BackstagePassUpdater extends DefaultItemUpdater
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->quality < 50) {
            $item->quality++;
        }

        if ($item->sellIn < 10) {
            $item->quality++;
        }

        if ($item->sellIn < 5) {
            $item->quality++;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }

        if ($item->sellIn < 0) {
            $item->quality = 0;
        }
    }
}
