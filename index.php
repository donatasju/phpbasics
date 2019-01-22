<?php
$sudas1 = rand(1,100);
$sudas2 = rand(101,200);
$sudas3 = rand(201,300);
?>
<html>
    <head>
        <title>Skolos skaiciuokle</title>
    </head>
    <body>
        <h1>Skolos skaiciuokle</h1>
        <p>
            Jei paemei <?php print $sudas1; ?> jievru Su dviem kabanciais
            grazinsi <?php print $sudas3; ?> Su vienu kabanciu grazinsi
            <?php print $sudas2; ?>
        </p>
    </body>
</html>

