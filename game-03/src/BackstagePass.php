<?php


namespace App;


class BackstagePass extends Item
{

    protected $rules = [
        5,10
    ];

    public function tick()
    {
        $this->reduceSellIn();

        $this->quality += 1;

        foreach ($this->rules as $rule)
        {
            if($this->sellIn < $rule)
            {
                $this->quality += 1;
            }
        }


        if ($this->sellIn < 0) {
            $this->quality = 0;
        }

        $this->validateQuality();

    }

}