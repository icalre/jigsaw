<?php


namespace App;


class BrieItem extends Item
{

    public function tick()
    {
        $this->reduceSellIn();

        $this->quality += 1;

        if ($this->sellIn <= 0) {
            $this->quality += 1;
        }

        $this->validateQuality();

    }
}