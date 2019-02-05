<?php
$bbd = [
    [
        'tekstas' => 'As',
        'color' => 'green',
        'form' => 'apskritimas'
    ],
    [
        'tekstas' => 'B',
        'color' => 'green',
        'form' => 'kvadratas'
    ],
    [
        'tekstas' => 'B',
        'color' => 'orange',
        'form' => 'kvadratas'
    ],
    [
        'tekstas' => 'D',
        'color' => 'red',
        'form' => 'kvadratas'
    ]
];

$istorijos = [
    [
        'story' => 'ifas nahui bbd',
        'color' => 'green',
    ],
    [
        'story' => 'foras su eachu nahui pz bbd',
        'color' => 'green',
    ],
    [
        'story' => 'array nahui pzda vapse bbd',
        'color' => 'orange',
    ],
    [
        'story' => 'funkcijos zopa totali',
        'color' => 'red',
    ],
];

function pzdamat($bbd, $l) {
    foreach ($bbd as $key => &$daiktas) {
        if ($key > $l) {
            $daiktas['color'] = 'grey';
        }

        $daiktas['show_text'] = false;

        if ($key == $l) {
            $daiktas['show_text'] = true;
        }
    }

    return $bbd;
}

function build_storyline($istorijos, $l) {
    $text = [];

    foreach ($istorijos as $key => $istorija) {
        if ($key <= $l) {
            $text[] = $istorija;
        }
    }

    return $text;
}

$l = rand(0, 3);
$bbd = pzdamat($bbd, $l);
$storiesnx = build_storyline($istorijos, $l);
var_dump($storiesnx);
?>

<html>
    <head>
        <title>bbdmatas</title>
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        <div class="flex">
            <?php foreach ($bbd as $daiktas): ?>
                <div class="block <?php print "{$daiktas['color']} {$daiktas['form']}" ?>">
                    <?php if ($daiktas['show_text']): ?>
                        <span><?php print $daiktas['tekstas']; ?></span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="istorijos">
            <ul>
                <?php foreach ($istorijos as $key => $istorija): ?>
                    <?php if ($key <= $l): ?> 
                        <li class="kurwa-<?php print $istorija['color']; ?>">
                            <?php print $istorija['story']; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </body>
</html>