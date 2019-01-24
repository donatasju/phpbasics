<?php

$lentynos = [
    'pirma_lentyna' => [
        'saldytuvas' => [
            [
                'produktas' => 'kiausiniai',
                'kiekis' => 3
            ],
            [
                'produktas' => 'grietine',
                'kiekis' => 1
            ],
            [
                'produktas' => 'jogurtas',
                'kiekis' => 2
            ]
        ],
        'saldiklis' => [
            [
                'produktas' => 'zuvis',
                'kiekis' => 0
            ]
        ]
    ],
    'antra_lentyna' => [
        'saldytuvas' => [
            [
                'produktas' => 'pienas',
                'kiekis' => 1
            ],
            [
                'produktas' => 'kefyras',
                'kiekis' => 0
            ]
        ],
        'ne_saldytuvas' => [
            [
                [
                    'produktas' => 'degtine',
                    'kiekis' => 2
                ],
                [
                    'produktas' => 'kecupas',
                    'kiekis' => 2
                ]
            ]
        ]
    ]
];
var_dump($lentynos);
