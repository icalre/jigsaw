<?php


namespace App;


class Item
{

    public $sellIn;
    public $quality;

    public function __construct($quality, $sellIn)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }


    public function reduceSellIn()
    {
        $this->sellIn -= 1;
    }

    public function validateQuality()
    {
        if($this->quality < 0)
        {
            $this->quality = 0;
        }

        if($this->quality > 50)
        {
            $this->quality = 50;
        }
    }

    public function tick()
    {
        
    }

}