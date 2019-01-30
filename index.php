<?php
$balius = [
    [
        'daiktas' => 'Zuvis',
        'owner' => 'Laura',
        'kiekis' => 1,
        'matas' => 'kibiras'
    ],
    [
        'daiktas' => 'Baklazanai',
        'owner' => 'Tomas',
        'kiekis' => 18,
        'matas' => 'kg'
    ],
    [
        'daiktas' => 'Aliejus',
        'owner' => 'Monika',
        'kiekis' => 0.7,
        'matas' => 'litras'
    ]
];
?>

<html>
    <head>
        <title>Balius</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php foreach ($balius as $value): ?>
            <table>
                <tr>
                    <td><?php print $value['kiekis']; ?></td>
                    <td class="<?php print $value['matas']; ?>"></td>
                    <td>Daiktas - <?php print $value['daiktas']; ?>;</td>
                    <td>Owner - <?php print $value['owner']; ?></td>
                </tr>
            </table>
        <?php endforeach; ?>

    </body>
</html>
