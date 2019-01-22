<?php
$sudas1 = (rand(1, 100));
$sudas2 = (rand(101, 200));
$sudas3 = (rand(201, 300));
?>

<html>
    <head>
        <title>Skola</title>
    </head>
    <body>
        <div>
            <h1>Skolos skaiciuokle</h1>
            <h2>Jei paemei <?php print $sudas1 ?> jievru</h2>
            <h3>Su dviem kabanciais grazinsi <?php print $sudas3 ?></h3>
            <h4>Su vienu kabanciu grazinsi <?php print $sudas2 ?></h4>
        </div>
    </body>
</html>