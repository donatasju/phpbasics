<?php
$random_flashback = '';
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
$random = rand(0, count($mano_atmintis)-1);
foreach ($mano_atmintis as $key => $value) {
    if ($key == $random) {
        $random_flashback = $value;
    }
};
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
        <h3><?php print $random_flashback ?></h3>
        <ol>
            <?php foreach ($mano_atmintis as $value): ?>
                <li>
                    <?php print $value ?>
                </li>            
            <?php endforeach ?>
        </ol>
    </body>
</html>