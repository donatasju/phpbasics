<?php
$months = 12;
$kisene = 1000;
$alga = 700;


for ($i = 0; $i <= $months; $i++) {
    $islaidos = rand(50, 2000);
    $rezult = ($kisene + $alga) - $islaidos;
    if ($rezult < 0) {
        print "Bloga prognoze: $i menesi gali baigtis pinigai! Atsargiai";
        break;
    }
}

?>
<html>
    <head>
        <title>Uzduotis 4</title>
    </head>
    <body>
        <p>
            Tavo kiseneje <?php print $rezult ?> euru.
        </p>
    </body>
</html>