<?php
$kates = rand(1, 3);
$sunys = rand(1, 3);
$katasuniai = null;
for ($i = 0; $i < $kates; $i++) {
    for ($j = 0; $j < $sunys; $j++) {
        $success = rand(0, 1);
        if ($success) {
            $katasuniai++;
            break;
        }
    }
}
?>
<html>
    <head>
        <title>Alus</title>
    </head>
    <body>
        <h1>Evente dalyvavo <?php print "$kates ir $sunys" ?></h1>
        <h2>Katasuniu iseiga: <?php print $katasuniai ?> </h2>
    </body>
</html>