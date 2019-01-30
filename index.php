<?php
$words = ['ne', 'nebegeriu', 'rukau', 'nerukau', 'geriu', 'telefonas', 'ekranas', 'programming', 'php', 'netbeans'];
$text = '';

for ($i = 0; $i < 300; $i++) {
    $text .= ' ' . $words[rand(0, count($words) - 1)];
    $i = strlen($text);
}
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <p><?php print "$i $text"; ?></p>
    </body>
</html>
