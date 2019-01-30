<?php

$balius = [
    [
        'daiktas' => 'Zuvis',
        'kiekis' => 1,
        'matas' => 'kibiras',
        'owneris' => 'Laura'
    ],
    [
        'daiktas' => 'Baklazanai',
        'kiekis' => 18,
        'matas' => 'kg',
        'owneris' => 'Tomas'
    ],
    [
        'daiktas' => 'Aliejus',
        'kiekis' => 0.7,
        'matas' => 'litras',
        'owneris' => 'Monika'
    ]
];
var_dump($balius);
?>
<html>
    <head>
        <title>Balius masyvas</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php foreach($balius as $value) :?>
        <div class="inventorius">
            <p>Kiekis: <?php print $value['kiekis']; ?></p>
            <div class="<?php print $value['matas']?>"></div>
            <p>Daiktas: <?php print $value['daiktas']; ?></p>
            <p>Kas atsinese: <?php print $value['owneris']; ?></p>
        </div>
        <?php endforeach; ?>
    </body>
</html>
