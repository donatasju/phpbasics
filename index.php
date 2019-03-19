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

    public function getPhoto() {
        if ($this->balls) {
            return 'https://upload.wikimedia.org/wikipedia/en/thumb/c/cc/Logo-TRUE.svg/1200px-Logo-TRUE.svg.png';
        } else {
            return 'https://1islam.files.wordpress.com/2012/08/false.jpg';
        }
    }

}

$surpise = new ThailandSurpise();
?>
<html>
    <head>
        <title>First day</title>
    </head>
    <body>
        <img src= "<?php print $surpise->getPhoto(); ?>" >
    </body>
</html>



