<?php
$name = ['Slapios serveteles', 'Telefonas', 'Pinigine', 'Plyta', 'Elektrosokas', 'Duju balionelis', 'Belenkas', 'Baklazanas'];
$rankinuko_dydis = rand(1, 20);

for ($i = 0; $i < $rankinuko_dydis; $i++) {
    $name_indexas = rand(0, count($name) - 1);
    $random_vardas = $name[$name_indexas];
    $size = rand(10, 50);
    $is_dark = rand(0, 1);

    if ($is_dark) {
        $spalva = 'Sviesus';
    } else {
        $spalva = 'Tamsus';
    }

    $rankinukas[] = [
        'name' => $random_vardas,
        'spalva' => $spalva,
        'size' => $size,
        'info' => "$random_vardas Uzima: $size cm3. Daikto spalva: $spalva"
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