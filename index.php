<?php
$kates = rand(1, 3);
$sunys = rand(1, 3);
$katasuniai = 0;

for ($i = 1; $i <= $kates; $i++) {
    for ($j = 1; $j <= $sunys; $j++) {
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
        <title>Uzduotis 4</title>
    </head>
    <body>
        <p>
            Event'e dalyvavo <?php print $kates; ?> kates ir <?php print $sunys; ?> sunys.
            Katasuniu iseiga: <?php print $katasuniai ?>
        </p>
    </body>
</html>