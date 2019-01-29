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
$all_size = 0;

for ($i = 0; $i <= $rankinuko_size; $i++) {
    $is_dark = rand(0, 1);
    $size = rand(2, 30);
    $all_size += $size;
    if ($is_dark) {
        $text = 'Dark';
    } else {
        $text = 'Light';
    }
    $daiktai_size = rand(0, count($daiktai) - 1);
    $random_pavadinimas = $daiktai[$daiktai_size];
    $rankinukas[] = [
        'name' => $random_pavadinimas,
        'size' => $size,
        'is_dark' => $text,
        'info' => "$random_pavadinimas uzima $size cm3. Daiktas yra $text. Tikimybe:",
    ];
    $all_size += $size;
}
foreach($rankinukas as &$value) {
    $daikto_tikimybe = round($value['size'] / $all_size * 100);
    if ($value['is_dark']) {
        $daikto_tikimybe /= 2;
    }
    $value['tikimybe'] = $daikto_tikimybe;
    $value['info'] .= $daikto_tikimybe . '%';
}
?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php foreach ($rankinukas as $daiktas): ?>
            <p><?php print $daiktas['info'] ?></p>
        <?php endforeach; ?>
    </body>
</html>
