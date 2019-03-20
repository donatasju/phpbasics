<?php

declare(strict_types = 1);

class Gerimas {

    private $data;

    public function __construct($name = null, $amount_ml = null, $abarot = null) {
        $this->data = [
            'name' => $name,
            'amount_ml' => $amount_ml,
            'abarot' => $abarot
        ];
    }

    public function setName(string $name) {
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

    public function getAbarot() {
        return $this->data['abarot'];
    }
    
    public function getData() {
        return $this->data;
    }
    public function setData(array $data) {
        $this->setName($data['name'] ?? null);
        $this->setAmount($data['amount_ml'] ?? null);
        $this->setAbarot($data['abarot'] ?? null);
    }

}

$gerimas = new Gerimas();
$gerimas->setData([
    'name' => 'Vodke',
    'amount_ml' => 1000,
    'abarot' => 40
]);
var_dump($gerimas);
