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

$jacuzzis = new Jacuzzi(600);
$petras = new User();
$piotras = new User();
$petras->peeInJacuzzi($jacuzzis, rand(0, 200) / 1000);
$piotras->peeInJacuzzi($jacuzzis, rand(0, 100) / 1000);
$skaidrumas = $jacuzzis->getWaterPurity();

?>
<html>
    <head>
        <title>OOP</title>
    </head>
    <body>
        <span>Skaidrus: <?php print $jacuzzis->amount_water; ?>L<span><br>
        <span>Neskaidrus: <?php print $jacuzzis->amount_non_water; ?>L</span><br>
        <span>Skaidrumas: <?php print $skaidrumas ;?>%</span>
    </body>    
</html>

