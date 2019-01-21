<?php
date_default_timezone_set('Europe/Vilnius');
$random_metai = rand(0,10);
$random_vaikai = rand(1,5);
$random_trumpo_metai = rand(2,12);
$random_spalva1 = rand(0,255);
$random_spalva2 = rand(0,255);
$random_spalva3 = rand(0,255);
$random_font_size = rand(10,50);
?>
<html>
    <head>
        <title>PHP lydes ir <?php print date('Y', strtotime('+' . $random_metai . 'year'));?></title>
    </head>
    <body style="background-color:rgb(<?php print $random_spalva1 . ',' . $random_spalva2 . ',' . $random_spalva3 ?>)">
        <h1 style="font-size:<?php print $random_font_size ?> ">Galbut turesiu <?php print $random_vaikai?> vaiku!</h1>
        <p style="color:rgb(<?php print $random_spalva3 . ',' . $random_spalva1 . ',' . $random_spalva3 ?>)">D. Trumpas nebebus <?php print date('Y-m-d', strtotime('+' . $random_trumpo_metai . 'year'));?> </p>
    </body>
</html>



