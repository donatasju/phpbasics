<?php

declare(strict_types = 1);

class Gerimas {

    private $data;

    public function __construct($data) {
        $this->data = [
            'name' => null,
            'amount_ml' => null,
            'abarot' => null
        ];
    }

    public function setName(String $name) {
        $this->data['name'] = $name;
    }

    public function getName() {
        return $this->data['name'];
    }

    public function setAmount(int $amount_ml) {
        $this->data['amount_ml'] = $amount_ml;
    }

    public function getAmount() {
        return $this->data['amount_ml'];
    }

    public function setAbarot(float $abarot) {
        $this->data['abarot'] = $abarot;
    }

    public function GetAbarot() {
        return $this->data['abarot'];
    }

}
