<?php
$random_skaicius = rand(1,6);
?>
<html>
    <head>
        <title>Alkoholio randomaizeris</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="<?php print "klase-$random_skaicius" ?>"></div>
    </body>
</html>
