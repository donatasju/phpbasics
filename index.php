<?php
$skaicius = 0;

if(isset($_POST['mygtukas'])){
    $skaicius = $_POST['mygtukas'] +1;
}
?>
<html>
    <head>
        <title>Formos</title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <button name="mygtukas" value="<?php print $skaicius ?>"><?php print $skaicius ?></button>
        </form>
    </body>
</html>