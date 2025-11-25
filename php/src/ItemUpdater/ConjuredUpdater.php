<?php

namespace GildedRose\ItemUpdater;

use GildedRose\Item;

class ConjuredUpdater extends DefaultItemUpdater
{
    public function update(Item $item): void
    {
        if ($item->quality > 1) {
            $item->quality = $item->quality - 2;
        }

        $item->sellIn--;

        if ($item->sellIn < 0 && $item->quality > 1) {
            $item->quality = $item->quality - 2;
        }
    }
}
