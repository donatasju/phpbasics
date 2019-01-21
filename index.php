<?php 
$second = date('s') * 10;

?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style/style.css">
        <style>
            .img {
                background-image: url("../images/bomb.png");
                background-repeat: no-repeat;
                background-size: contain;
                width: <?php print $second; ?>px;
                height: <?php print $second; ?>px;
            }
        </style>
    </head>
    <body>
        <div class="img"></div>
        <div><?php print date('s') ?></div>
    </body>
</html>
