<?php
$daiktai = [
    'Kremas',
    'Riesutai',
    'Telefonas',
    'Kompas',
    'Masina',
    'Klavetura',
    'fakin hell',
    'dahuje dalyku'
];
$rankinuko_size = rand(1, 10);

for ($i = 0; $i <= $rankinuko_size; $i++) {
    $is_dark = rand(0, 1);
    if ($is_dark) {
        $text = 'Dark';
    } else {
        $text = 'Light';
    }
    $size = rand(2, 30);
    $daiktai_size = rand(0, count($daiktai) - 1);
    $random_pavadinimas = $daiktai[$daiktai_size];
    $rankinukas[] = [
        'name' => $random_pavadinimas,
        'size' => $size,
        'is_dark' => $text,
        'info' => "$random_pavadinimas uzima $size cm3. Daiktas yra $text"
    ];
}
?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php foreach ($rankinukas as $daiktas): ?>
            <p><?php print $daiktas['info']; ?></p>
        <?php endforeach; ?>
    </body>
</html>
