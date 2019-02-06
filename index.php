<?php
$text = 'Iveskite skaiciu';

if (isset($_POST['ka_pakelti'])) {
    $pakelti = $_POST['ka_pakelti'];
    $text = empty($pakelti) ? 'Neivedei' : suma($pakelti);
}

function suma($x) {
    $suma = $x ** 2;
    return $suma;
}
?>
<html>
    <head>
        <title>Formos</title>
    </head>
    <body>
        <form action="index.php" method="POST">
            Ka pakelti kvadratu
            <input name="ka_pakelti" type="number"/>
            <input type="submit"/>
            <p><?php print $text ?></p>
        </form>
    </body>
</html>