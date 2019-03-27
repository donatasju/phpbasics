<?php

namespace App\Item;

Class Gerimas {

    private $data;

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'name' => null,
                'amount_ml' => null,
                'abarot' => null,
                'image' => null
            ];
        }
    }

    public function setName(string $name) {
        $this->data['name'] = $name;
    }

    public function setAmount(int $amount_ml) {
        $this->data['amount_ml'] = $amount_ml;
    }

    public function setAbarot(float $abarot) {
        $this->data['abarot'] = $abarot;
    }
    
    public function setImage(string $image) {
        $this->data['image'] = $image;
    }

    public function getName() {
        return $this->data['name'];
    }

    public function getAmount() {
        return $this->data['amount_ml'];
    }

    public function getAbarot() {
        return $this->data['abarot'];
    }
    
     public function getImage() {
        return $this->data['image'];
    }

    public function getData() {
        return $this->data;
    }

    public function setData(array $data) {
        $this->setName($data['name'] ?? '');
        $this->setAmount($data['amount_ml'] ?? 0);
        $this->setAbarot($data['abarot'] ?? 0);
        $this->setImage($data['image'] ?? '');
    }

}

?>