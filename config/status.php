<?php
return [
    'hotel' => ['active', 'blocked'],
    'room' => ['free', 'blocked', 'booked'],

    'order' => [
        'room'  => [
            0 => [
                'title' => 'Error',
                'code' => '',
            ],
            1 => [
                'title' => 'Pending',
                'code' => 1,
            ],
            2 => [
                'title' => 'Confirmed',
                'code' => 2,
            ],
            3 => [
                'title' => 'Cancel',
                'code' => 3,
            ],
            4 => [
                'title' => 'Reject',
                'code' => 4,
            ]
        ],
        'car'   => [],
    ]
];