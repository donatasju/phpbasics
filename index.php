<?php
$sertifikatas = 'Iveskite savo duomenis';
$border = '';

$vardas = $_POST['vardas'] ?? false;
$pavarde = $_POST['pavarde'] ?? false;
$amzius = $_POST['amzius'] ?? false;
$lygis = $_POST['lygis'] ?? false;

if (!empty($vardas && $pavarde && $lygis)) {
    $sertifikatas = "DUCHO SERTIFIKATAS: <br> Vardas Pavarde: $vardas $pavarde <br> Amzius: $amzius <br> Lygis: $lygis";
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
            Vardas: <br><input name="vardas" type="text" placeholder="pvz. Jonas" required/><br>
            Pavarde: <br><input name="pavarde" type="text" placeholder="pvz. Petrauskas" required/><br>
            Amzius: <br><input name="amzius" type="number" placeholder="pvz. 26"/><br>
            Lygis: <br>
            <select name="lygis">
                <option value="pradedantysis" selected>Pradedantysis</option>
                <option value="pazenges">Pazenges</option>
                <option value="profas">Profas</option>
            </select>
            <button type="submit">Generuoti Ducho Sertifikata</button>
        </form>
        <p class="<?php print $border ?>"><?php print $sertifikatas ?></p>
    </form>        
</body>
</html>