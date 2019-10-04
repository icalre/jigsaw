<?php


namespace App;


class ConjuredItem extends Item
{

    public function tick()
    {
        $this->reduceSellIn();
        $this->quality -= 2;

        if ($this->sellIn <= 0) {
            $this->quality -= 2;
        }

        $this->validateQuality();

    }

}