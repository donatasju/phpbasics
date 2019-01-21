<?php
Date_default_timezone_set('Europe/Vilnius');
$rand_number = rand(1, 10);
$rand_titledate = date('Y.m.d', strtotime("+$rand_number" . 'year'));
$rand_number2 = rand(2, 12);
$rand_trumpdate = date('Y.m.d', strtotime("+$rand_number2" . 'year'));
$rand_color = rand(0, 255);
$rand_color1 = rand(0, 255);
$rand_color2 = rand(0, 255);
$rand_h1_size = rand(0, 50);
?>

<html>
    <head>
        <title>PHP lydes ir <?php print $rand_titledate ?> </title>
    </head>
    <body style="background-color: rgb(<?php print "$rand_color,$rand_color1,$rand_color2" ?>)">
        <h1 style="font-size: <?php print $rand_h1_size . 'px' ?>">Donatas - galbut turesiu <?php print rand(1, 5) ?> vaiku(us) !</h1>
        <p style="color: rgb(<?php print "$rand_color2,$rand_color,$rand_color1"?>">D. Trump'as nebebus prezidentu <?php print $rand_trumpdate ?></p>
    </body>
</html>