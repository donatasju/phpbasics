<?php
$suma = 0;
if(isset($_POST['ka_pakelti'])){
    $pakelti = $_POST['ka_pakelti'];
    $suma = $pakelti * $pakelti;
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
            <p><?php print $suma ?></p>
        </form>
    </body>
</html>