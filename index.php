<?php
$sertifikatas = 'Iveskite savo duomenis';
$border = '';

$vardas = $_POST['vardas'] ?? false;
$pavarde = $_POST['pavarde'] ?? false;
$amzius = $_POST['amzius'] ?? false;
$lygis = $_POST['lygis'] ?? false;

if (!empty($vardas && $pavarde && $lygis)) {
    $sertifikatas = "DUCHO SERTIFIKATAS: <br> Vardas Pavarde: <br> $vardas $pavarde <br> Amzius: $amzius <br> Lygis: $lygis";
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
        <p class="<?php print $border ?>"><?php print $sertifikatas ?></p> 
    </body>
</html>