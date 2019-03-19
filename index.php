<?php

class ThailandSurpise {

    public $clothes;
    private $balls;

    public function __construct() {
        $this->balls = rand(0, 1);
        $this->clothes = $clothes;
    }
    
    public function attachBalls() {
        $this->balls = true;
    }
    
    public function detachBalls() {
        $this->balls = false;
    }
}

$miniskirt = new ThailandSurpise();



