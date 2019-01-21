<?php
Date_default_timezone_set('Europe/Vilnius');
$time = date('l', strtotime('tomorrow'));
$hour = date('H.i', strtotime('-1 hour'));
$year = date('Y', strtotime('+1 year'))
?>
<html>
    <head>
        <title>PHP lydes ir <?php print $time ?></title>
    </head>
    <body>
        <h1>Donatas - PHP su manim buvo ir <?php print $hour ?></h1>
        <p><?php print $year ?> ne uz kalnu !</p>
    </body>
</html>