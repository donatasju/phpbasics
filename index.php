<?php

class ThailandSurpise {

    public $clothes;
    private $balls;
    
    public function __construct() {
        $this->balls = rand(0, 1);
    }

}

$miniskirt = new ThailandSurpise();

$miniskirt->clothes = 'miniskirt';
print $miniskirt->clothes;


