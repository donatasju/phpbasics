<?php

$sheep = ['pizdaaa'];
for ($i = 1; $i < 5; $i++) {
    $sheep[$i] = &$sheep[$i -1];
}
var_dump($sheep);
?>