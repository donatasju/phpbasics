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
$draugo_atmintis = [
    'Penktadienis',
    '1 Alaus',
    '2 Alaus',
    'Burgeris',
    '3 Alaus',
    '4 Alaus',
    'Kepta duona',
    '5 Alaus',
    'Drauge apipyle Ernesta raudonu vynu',
    'Prikolinam is slapios maikes'
];
$random = rand(0, count($mano_atmintis) - 1);
$random_flashback = $mano_atmintis[$random];    
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
        <h2>Draugo atmintis:</h2>   
        <ol>
            <?php foreach ($draugo_atmintis as $value): ?>
                <li>
                    <?php print $value ?>
                </li>            
            <?php endforeach ?>
        </ol>
    </body>
</html>