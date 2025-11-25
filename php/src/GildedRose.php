<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\ItemUpdater\AgedBrieUpdater;
use GildedRose\ItemUpdater\BackstagePassUpdater;
use GildedRose\ItemUpdater\ConjuredUpdater;
use GildedRose\ItemUpdater\DefaultItemUpdater;
use GildedRose\ItemUpdater\SulfurasUpdater;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->getUpdater($item)
                ->update($item);
        }
    }

    private function getUpdater(Item $item): SulfurasUpdater|DefaultItemUpdater|BackstagePassUpdater|ConjuredUpdater|AgedBrieUpdater
    {
        return match ($item->name) {
            ItemNames::AGED_BRIE->value => new AgedBrieUpdater(),
            ItemNames::BACKSTAGE_PASS->value => new BackstagePassUpdater(),
            ItemNames::SULFURAS->value => new SulfurasUpdater(),
            ItemNames::CONJURED->value => new ConjuredUpdater(),
            default => new DefaultItemUpdater(),
        };
    }
}
