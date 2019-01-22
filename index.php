<?php
$jievrai = rand(1, 100);
$pirmas_grazinti = rand(101, 200);
$antras_grazinti = rand(201, 300);

?>
<html>
    <head>
        <title>Skola</title>
    </head>
    <body>
        <h1>Skolos skaiciuokle</h1>
        <h2>Jei paemei <?php print $jievrai; ?> jievru</h2>
        <p>
            Su vienu kabanciu grazinsi <?php print $pirmas_grazinti; ?><br>
            Su dviem kabanciais grazinsi <?php print $antras_grazinti; ?>
        </p>
    </body>
</html>