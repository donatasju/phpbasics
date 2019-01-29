<?php
$name = ['Slapios serveteles', 'Telefonas', 'Pinigine', 'Plyta', 'Elektrosokas', 'Duju balionelis', 'Belenkas', 'Baklazanas'];
$rankinuko_dydis = rand(0, 20);

for ($i = 0; $i < $rankinuko_dydis; $i++) {
    $name_masyvo_dydis = rand(0, count($name) - 1);
    $size = rand(10, 50);
    $is_dark = rand(0, 1);
    if ($is_dark) {
        $spalva = 'Sviesus';
    } else {
        $spalva = 'Tamsus';
    }
    $rankinukas[] = [
        'name' => $name[$name_masyvo_dydis],
        'spalva' => $spalva,
        'size' => $size
    ];
}
?>
<html>
    <head>
        <title>Random Rankinukas</title>
    </head>
    <body>
        <?php foreach ($rankinukas as $daiktas): ?>
            <p><?php print $daiktas['name']; ?> Uzima: <?php print $daiktas['size']; ?>cm3</p>
            <p>Daiktas uzima: <?php print $daiktas['spalva']; ?> </p>
        <?php endforeach; ?>
    </body>
</html>