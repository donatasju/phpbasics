<?php
$jievrai = (rand(1, 100));
$antras_grazinti = (rand(201, 300));
$pirmas_grazinti = (rand(101, 200));

?>

<html>
    <head>
        <title>Skola</title>
    </head>
    <body>
        <div>
            <h1>Skolos skaiciuokle</h1>
            <h2>Jei paemei <?php print $jievrai ?> jievru</h2>
            <h3>Su dviem kabanciais grazinsi <?php print $antras_grazinti ?></h3>
            <h4>Su vienu kabanciu grazinsi <?php print $pirmas_grazinti ?></h4>
        </div>
    </body>
</html>