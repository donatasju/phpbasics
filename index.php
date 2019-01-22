<?php
$pasiskolintu_pinigu_suma = rand(1,100);
$pasiskolintu_pinigu_suma_su_dviem_kabanciais = rand(101,200);
$pasiskolintu_pinigu_suma_su_vienu_kabanciu = rand(201,300);
?>
<html>
    <head>
        <title>Skolos skaiciuokle</title>
    </head>
    <body>
        <h1>Skolos skaiciuokle</h1>
        <p>
            Jei paemei <?php print $pasiskolintu_pinigu_suma; ?> jievru Su dviem kabanciais
            grazinsi <?php print $pasiskolintu_pinigu_suma_su_vienu_kabanciu; ?> Su vienu kabanciu grazinsi
            <?php print $pasiskolintu_pinigu_suma_su_dviem_kabanciais; ?>
        </p>
    </body>
</html>

