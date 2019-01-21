<?php
$sekunde = date("s");
$sekunde_kart_10 = $sekunde * 10;
?>
<html>
    <head>
        <title>Bomba</title>
        <link rel="stylesheet" href="css/main.css">
        <style>
            .klase-1 {
                background-image: url("../images/bomb.jpg");
                width: <?php print $sekunde_kart_10 ?>px;
                height: <?php print $sekunde_kart_10 ?>px;
                background-size: contain;
                background-repeat: no-repeat;
            }
        </style>
    </head>
    <body>
        <div class="klase-1"></div>
        <div><?php print $sekunde?></div>
    </body>
</html>
