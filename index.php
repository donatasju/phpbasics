<?php

class Jacuzzi {

    public $amount_water;
    public $amount_non_water;

    public function __construct($water = 0, $non_water = 0) {
        $this->amount_water = $water;
        $this->amount_non_water = $non_water;
    }
    
    public function getWaterPurity() {
        return $this->amount_water / ($this->amount_water + $this->amount_non_water) * 100;
        
    }
    
}

class User {
    
    public function peeInJacuzzi (Jacuzzi $jacuzzi, $amount) {
        $jacuzzi->amount_non_water += $amount;
    }
}

$skaidruu = new Jacuzzi(30, 10);

print $skaidruu->getWaterPurity();
