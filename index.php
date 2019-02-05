<?php

$sheep = ['pizdaaa'];

for ($i = 1; $i < 5; $i++) {
    $sheep[] = &$sheep[$i - 1];
}

foreach ($sheep as $key => $value) {
    unset ($sheep[$key]);
    $sheep[$key] = $value;
}

$sheep[3] = 'zopaaa';

var_dump($sheep);
?>