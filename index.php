<?php
Date_default_timezone_set('Europe/Vilnius');
?>
<html>
    <head>
        <title>PHP lydes ir <?php print date('Y-m-d', strtotime('+1 day'))?></title>
    </head>
    <body>
        <h1>Ernestas - PHP su manim buvo ir <?php print date('H:i', strtotime('-1 hour')) . ' valanda'?> </h1>
        <p><?php print date('Y', strtotime('+1 year')); ?> ne uz kalnu!</p>
    </body>
</html>



