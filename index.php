<?php
Date_default_timezone_set('Europe/Vilnius');
$rand_date = rand(1, 10);
$rand = date('Y.m.d', strtotime("+$rand_date" . 'year'));
$rand_max = rand(2, 12);
$rand_last = date('Y.m.d', strtotime("+$rand_max" . 'year'));
?>

<html>
    <head>
        <title>PHP lydes ir <?php print $rand ?> </title>
    </head>
    <body>
        <h1>Donatas - galbut turesiu <?php print rand(1, 5) ?> vaiku(us) !</h1>
        <p>D. Trump'as nebebus prezidentu <?php print $rand_last ?></p>
    </body>
</html>