<?php
$sunny = rand(0,1);
?>
<html>
    <head>
        <title>Uzduotis 5</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php if ($sunny): ?>
        <h1 class="sunny">It is sunny !</h1>
        <?php else: ?>
        <h1 class="shitty">Shitty weather !</h1>
        <?php endif; ?>
    </body>
</html>