<?php
$file = $_FILES['file'] ?? false;
$teisingi_atsakymai = 0;

$masyvas = [
    [
        'klausimas' => 'Ar sasalini sasyska?',
        'atsakymas' => ['taip', 'Xujnia', 'nebepisk proto'],
        'teisingas' => 2
    ],
    [
        'klausimas' => 'Ar bybis kiausai?',
        'atsakymas' => ['zopa', 'pizdiec', 'taskau ir lapnoju'],
        'teisingas' => 0
    ],
    [
        'klausimas' => 'Ar myli burokus?',
        'atsakymas' => ['taip', 'visiskai', 'sikna'],
        'teisingas' => 1
    ],
    [
        'klausimas' => 'Ar kartais atsimeki?',
        'atsakymas' => ['saules akiniai = cool guy', 'ne', 'bijau nes pamatysiu Donata'],
        'teisingas' => 2
    ],
    [
        'klausimas' => 'Ar pizda vapse?',
        'atsakymas' => ['neviltis...', 'soksiu pro langa be parasiuto', 'laukiu penktadienio ir alaus'],
        'teisingas' => 2
    ]
];

function save_file($file, $dir = 'uploads', $allowed_types = ['image/jpeg', 'image/png']) {
    if ($file['error'] == 0 && in_array($file['type'], $allowed_types)) {
        $target_file_name = microtime() . '-' . strtolower($file['name']);
        $target_path = $dir . '/' . $target_file_name;

        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            return true;
        }
    }
    return false;
}

if (!empty($file)) {
    save_file($file);
}

if (!empty($_POST)) {
    $action = $_POST['action'] ?? false;
    if ($action != 'reset') {
        foreach ($_POST as $key => $ats) {
            if ($ats == $masyvas[$key]['teisingas']) {
                $teisingi_atsakymai++;
            }
        }
        $atsakymas = 100 / count($masyvas) * $teisingi_atsakymai;
    }
}
?>
<html>
    <head>
        <title>Formos</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <form enctype="multipart/form-data" method="POST" action="index.php">
            <label>Tavo foto:<input name="file" type="file"></label>            
            <?php foreach ($masyvas as $klausimo_id => $klausimas): ?>
                <div>
                    <h3><?php print $klausimas['klausimas'] ?></h3>
                    <?php foreach ($klausimas['atsakymas'] as $atsakymo_id => $ats): ?>
                        <label>
                            <span><?php print $ats ?></span>
                            <input type="radio" name="<?php print $klausimo_id; ?>" value="<?php print $atsakymo_id ?>">
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <input type="submit" value="Duok Rezultata!">
            <?php if (isset($atsakymas)): ?>
                <p><?php print $atsakymas . '%' ?></p>
                <button name="action" value="reset">RESET</button>
            <?php endif; ?>

        </form>
    </body>
</html>