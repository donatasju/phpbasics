<?php
$months = 12;
$kisene = 1000;
$alga = 700;

for ($i = 0; $i <= $months; $i++) {
    $islaidos = rand(50, 1700);
    $kisene += $alga - $islaidos;
    if ($kisene <= 0) {
        $text = "Bloga prognoze: po $i menesi gali baigtis pinigai! Atsargiai. Likutis $kisene euru";
        break;
    } else {
        $text = "Tavo kiseneje $kisene euru po $i menesiu.";
    }
}

?>
<html>
    <head>
        <title>Uzduotis 4</title>
    </head>
    <body>
        <p>
            <?php print $text; ?>
        </p>
    </body>
</html>