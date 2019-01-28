<?php
$mano_atmintis = [
    'Penktadienis',
    '1 Alaus',
    '2 Alaus',
    'Pamyzt',
    '3 Alaus',
    '4 Alaus',
    'Pamyzt',
    '5 Alaus',
    'Apipilta maike raudonu vynu',
    '6 Alaus su slapia maike'
];
?>
<html>
    <head>
        <title>
            Penktadienis...
        </title>
    </head>
    <body>
        <h1>WTF?!</h1>
        <h2>Mano atmintis:</h2>
        <ol>
            <?php foreach ($mano_atmintis as $value): ?>
                <li>
                    <?php print $value ?>
                </li>            
            <?php endforeach ?>
        </ol>
    </body>
</html>