<?php

class ThailandSurpise {

    public $clothes;
    private $balls;

    public function __construct() {
        $this->balls = rand(0, 1);
    }
    
    public function attachBalls() {
        $this->balls = true;
    }
    
    public function detachBalls() {
        $this->balls = false;
    }
}

$surpise = new ThailandSurpise();

$surpise->clothes = 'miniskirt';



