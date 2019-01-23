<?php
$po_alaus = rand(1, 5);
$dar_alaus = 0;
$kablys = 1;
for ($i = 0; $i < $po_alaus; $i++){
    $dar_alaus += floor($po_alaus/2) + $kablys;
}
?>
<html>
    <head>
        <title>Alus</title>
    </head>
    <body>
        <p>Po <?php print $po_alaus ?> alaus tiketina, dar imsiu <?php print $dar_alaus ?> alaus.</p>
    </body>
</html>