<?php
return [
    'room' => [
        'booking_option' => [
            0 => [
                'title' => 'Free booking',
                'code' => '',
            ],
            1 => [
                'title' => 'Prepayment',
                'code' => 1,
            ],
        ],
        'payment_type' => [
            0 => [
                'title' => 'None',
                'code' => '',
            ],
            1 => [
                'title' => 'Percent %',
                'code' => 1,
            ],
            2 => [
                'title' => 'Fixed value',
                'code' => 2,
            ],
        ],
        'admin' => [
            'max_booking_range_day' => 180
        ]

    ],
];