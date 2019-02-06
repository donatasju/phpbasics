<?php
$sertifikatas = 'Iveskite savo duomenis';
$border = '';
$ducho_sertifikatas = '';
$lygis_text = '';
$vardas_pavarde = '';

$vardas = $_POST['vardas'] ?? false;
$pavarde = $_POST['pavarde'] ?? false;
$amzius = $_POST['amzius'] ?? false;
$lygis = $_POST['lygis'] ?? false;

if (!empty($vardas && $pavarde && $lygis)) {
    $ducho_sertifikatas = 'DUCHO SERTIFIKATAS:';
    $vardas_pavarde = 'Vardas ir Pavarde:';
    $lygis_text = 'Lygis:';
    $border = 'border';
}
?>
<html>
    <head>
        <title>Formos</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <form action="index.php" method="POST">
            <p>Vardas: <input name="vardas" type="text" placeholder="pvz. Jonas" required/></p>
            <p>Pavarde: <input name="pavarde" type="text" placeholder="pvz. Petrauskas" required/></p>
            <p>Amzius: <input name="amzius" type="number" placeholder="pvz. 26"/></p>
            <p>
                Lygis: 
                <select name="lygis">
                    <option value="pradedantysis" selected>Pradedantysis</option>
                    <option value="pazenges">Pazenges</option>
                    <option value="profas">Profas</option>
                </select>
            </p>
            <button type="submit">Generuoti Ducho Sertifikata</button>
        </form>
        <div class="<?php print $border ?>">
            <h2><?php print $ducho_sertifikatas ?></h2>
            <h3><?php print $vardas_pavarde ?></h3>
            <h3><?php print $vardas . ' ' . $pavarde ?></h3>
            <h3><?php print $lygis_text . ' ' . $lygis ?></h3>
        </div> 
    </body>
</html>