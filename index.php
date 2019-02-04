<?php
$bbd = [
    [
        'forma' => 'apskritimas',
        'spalva' => 'green',
        'textas' => 'AS'
    ],
    [
        'forma' => 'kvadratas',
        'spalva' => 'green',
        'textas' => 'B'
    ],
    [
        'forma' => 'kvadratas',
        'spalva' => 'orange',
        'textas' => 'B'
    ],
    [
        'forma' => 'kvadratas',
        'spalva' => 'red',
        'textas' => 'D'
    ]
];

$stories = [
    [
        'text' => 'Plyta nesijuoke is mano medinio bajerio',
        'spalva' => 'green'
    ],
    [
        'text' => 'Kalbejau su plyta - ji neatsake atgal',
        'spalva' => 'green'
    ],
    [
        'text' => 'Kostiumas per mazas pasimatymui su plyta',
        'spalva' => 'orange'
    ],
    [
        'text' => 'Skauda b*b* atsiremus i plyta',
        'spalva' => 'red'
    ]
];

function build_storyline($stories, $level) {
    $new_story = [];
    foreach ($stories as $key => $istorija) {
        if ($key <= $level) {
            $new_story[] = $istorija;
        }
    }
    return $new_story;
}

function pzdamat($bbd, $level) {
    foreach ($bbd as $key => &$dalis) {
        if ($key > $level) {
            $dalis['spalva'] = 'gray';
        }
        $dalis['show_text'] = false;
        if ($key <= $level) {
            $dalis['show_text'] = true;
        }
    }
    return $bbd;
}

$level = rand(0, 3);
$bbd = pzdamat($bbd, $level);
$storyline = build_storyline($stories, $level);
?>
<html>
    <head>
        <title>BBD mat</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="flex">
            <?php foreach ($bbd as $dalis): ?>
                <div class="block <?php print $dalis['forma'] . ' ' . $dalis['spalva']; ?>">
                    <?php if ($dalis['show_text']): ?>
                        <span><?php print $dalis['textas']; ?></span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="stories">
            <ul>
                <?php foreach ($stories as $key => $story): ?>
                    <?php if ($key <= $level): ?> 
                        <li class="<?php print $story['spalva']; ?>">
                            <?php print $story['text']; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </body>
</html>