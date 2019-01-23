<?php
$months = 12;
$kisene = 1000;
$alga = 700;

for ($i = 0; $i < $months; $i++) {
    $islaidos = rand(500, 1000);
    $kisene += $alga - $islaidos;
    if ($kisene < 0) {
        $babkes = "Babkes tau baigsis $i menesi";
        break;
    } else {
        $babkes = "Tau liko: $kisene";
    }
}
?>
<html>
    <head>
        <title>Alga</title>
    </head>
    <body>
        <?php print $babkes; ?>
    </body>
</html>