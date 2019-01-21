<?php
date_default_timezone_set('Europe/Vilnius');
$random_metai = rand(0,10);
$random_vaikai = rand(1,5);
$random_trumpo_metai = rand(2,12);
?>
<html>
    <head>
        <title>PHP lydes ir <?php print date('Y', strtotime('+' . $random_metai . 'year'));?></title>
    </head>
    <body>
        <h1>Galbut turesiu <?php print $random_vaikai?> vaiku!</h1>
        <p>D. Trumpas nebebus <?php print date('Y-m-d', strtotime('+' . $random_trumpo_metai . 'year'));?> </p>
    </body>
</html>



