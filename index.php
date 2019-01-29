<?php
$name = [
    'Slapios serveteles',
    'Telefonas',
    'Pinigine',
    'Plyta',
    'Elektrosokas',
    'Duju balionelis',
    'Belenkas',
    'Baklazanas'
];
$rankinuko_dydis = rand(1, 20);
$rankinuko_turis = 0;

for ($i = 0; $i < $rankinuko_dydis; $i++) {
    $name_indexas = rand(0, count($name) - 1);
    $random_vardas = $name[$name_indexas];
    $size = rand(10, 50);
    $is_dark = rand(0, 1);
    $rankinuko_turis += $size;
    $daikto_tikimybe = $size/$rankinuko_turis *100;
    
    if ($is_dark) {
        $spalva = 'Sviesus';
    } else {
        $spalva = 'Tamsus';
        round($daikto_tikimybe / 2);
    }

    $rankinukas[] = [
        'name' => $random_vardas,
        'spalva' => $spalva,
        'size' => $size,
        'tikimybe' => $daikto_tikimybe,
        'info' => "$random_vardas Uzima: $size cm3. Daikto spalva: $spalva, Tikimybe: $daikto_tikimybe %"
    ];
}
?>
<html>
    <head>
        <title>Random Rankinukas</title>
    </head>
    <body>
        <?php foreach ($rankinukas as $daiktas): ?>
            <p><?php print $daiktas['info']; ?></p>
        <?php endforeach; ?>
    </body>
</html>