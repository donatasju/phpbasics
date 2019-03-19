<?php

class ThailandSurpise {

    public $clothes;
    private $balls;

    public function __construct() {
        $this->balls = rand(0, 1);
        $this->clothes = $clothes;
    }
    
    public function attachBalls() {
        $this->balls = 1;
    }
    
    public function detachBalls() {
        $this->balls = 0;
    }
}

$miniskirt = new ThailandSurpise();



