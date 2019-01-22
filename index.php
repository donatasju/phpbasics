<?php
$sunny = rand(0,1);
?>
<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div>
            <?php if($sunny): ?>
            <div class="sauleta">Sauleta</div>
            <?php else: ?>
            <div class="debesuota">Debesuota</div>
            <?php endif; ?>
        </div>
    </body>
</html>