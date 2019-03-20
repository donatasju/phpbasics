<?php

class Jacuzzi {

    public $amount_water;
    public $amount_non_water;

    public function __construct($amount_water = 0, $amount_non_water = 0) {
        $this->amount_water = $amount_water;
        $this->amount_non_water = $amount_non_water;
    }
    
}
