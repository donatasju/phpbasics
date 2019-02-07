<?php
$sertifikato_array = [];

$vardas = $_POST['vardas'] ?? false;
$pavarde = $_POST['pavarde'] ?? false;
$amzius = $_POST['amzius'] ?? false;
$lygis = $_POST['lygis'] ?? false;

if (!empty($vardas && $pavarde && $lygis)) {
    $sertifikato_array = [
        'antraste' => 'DUCHO SERTIFIKATAS',
        'duomenys' => [
            'vardas' => $vardas,
            'pavarde' => $pavarde,
            'amzius' => $amzius,
            'lygis' => $lygis
        ]
    ];
    if (empty($amzius)) {
        unset($sertifikato_array['duomenys']['amzius']);
    }
}
?>
<html>
    <head>
        <title>Formos</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <form action="index.php" method="POST">
            <label>Vardas: <input name="vardas" type="text" placeholder="pvz. Jonas" required/></label>
            <label>Pavarde: <input name="pavarde" type="text" placeholder="pvz. Petrauskas" required/></label>
            <label>Amzius: <input name="amzius" type="number" placeholder="pvz. 26"/></label>
            <label>
                Lygis: 
                <select name="lygis">
                    <option value="pradedantysis" selected>Pradedantysis</option>
                    <option value="pazenges">Pazenges</option>
                    <option value="profas">Profas</option>
                </select>
            </label>
            <button type="submit">Generuoti Ducho Sertifikata</button>
        </form>
        <?php if (!empty($sertifikato_array)): ?>
            <div class="border">      
                <h2><?php print $sertifikato_array['antraste']; ?></h2>
                <?php foreach ($sertifikato_array['duomenys'] as $key => $value): ?>                    
                    <span class="blokas">
                        <?php print $key . ': ' . $value; ?>
                    </span>
                <?php endforeach; ?>
            </div> 
        <?php endif; ?>
    </body>
</html>