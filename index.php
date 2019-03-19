<?php

class ThailandSurpise {

    public $clothes;
    private $balls;
    private $name;

    public function __construct($name) {
        $this->balls = rand(0, 1);
        $this->name = $name;
    }

    public function attachBalls() {
        $this->balls = true;
    }

    public function detachBalls() {
        $this->balls = false;
    }

    public function getPhoto() {
        if ($this->balls) {
            return 'https://upload.wikimedia.org/wikipedia/en/thumb/c/cc/Logo-TRUE.svg/1200px-Logo-TRUE.svg.png';
        } else {
            return 'https://1islam.files.wordpress.com/2012/08/false.jpg';
        }
    }

}

$surpise = new ThailandSurpise('Donatas');
?>
<html>
    <head>
        <title>First day of OOP</title>
    </head>
    <body>
        <img src= "<?php print $surpise->getPhoto(); ?>" >
    </body>
</html>



