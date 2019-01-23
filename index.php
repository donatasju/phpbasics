<?php
$po_alaus = rand(1, 5);
$dar_alaus = 0;
$kablys = 1;
for ($x = 1; $x <= $po_alaus; $x++) {
    $extra_alaus = floor($po_alaus / 2) + $kablys;
    if ($po_alaus + $extra_alaus > 12) {
        break;
    }
    $dar_alaus += $extra_alaus;
}
?>
<html>
    <head>
        <title>Alus</title>
    </head>
    <body>
        
    </body>
</html>