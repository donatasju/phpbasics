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
$random = rand(1, count($mano_atmintis));
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
        <h3>
            <?php foreach($mano_atmintis as $key => $value): ?>
            <?php if($key == $random): ?>
            <?php print $value ?>
            <?php endif ?>
            <?php endforeach ?>
        </h3>
    </body>
</html>