<?php
$random = rand(0,10);
$vaikai = rand(1,5);
$random2 = rand(2,12);
?>
<html>
    <head>
        <title>PHP lydes ir <?php print date('Y', strtotime('+'.($random).'year'))?></title>
    </head>
    <body>
        <h1>Galbut turesiu <?php print $vaikai?> vaiku!</h1>
        <p>D. Trumpas nebebus <?php print date('Y-m-d', strtotime('+'.($random2).'year'))?> </p>
    </body>
</html>



