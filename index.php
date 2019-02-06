<?php
$skaicius = 0;

if (isset($_POST['mygtukas'])) {
    $skaicius = $_POST['mygtukas'] + 1;
}
?>
<html>
    <head>
        <title>Formos</title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <button name="mygtukas" value="<?php print $skaicius ?>">Paspaudimo Nr. <?php print $skaicius ?></button>
            <?php for ($i = 0; $i < $skaicius; $i++): ?>
                <img src="images/test.gif" height="200" width="200">
            <?php endfor; ?> 
        </form>
    </body>
</html>