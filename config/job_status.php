<?php

return [
    'status' => [
        '0' => 'passed',
        '1' => 'failed',
        '2' => 'under-review',
        '3' => 'review-passed',
        '4' => 'review-failed',
        '5' => 'manual-pass',
    ],
    'color' => [
        'passed' => [ 'color' => 'text-green-500', 'bg_color' => 'bg-white'],
        'failed' => [ 'color' => 'text-red-500', 'bg_color' => 'bg-white'],
        'under-review' => [ 'color' => 'text-yellow-700', 'bg_color' => 'bg-yellow-200'],
        'review-passed' => [ 'color' => 'text-green-700', 'bg_color' => 'bg-green-200'],
        'review-failed' => [ 'color' => 'text-red-700', 'bg_color' => 'bg-red-200'],
        'manual-pass' => [ 'color' => 'text-white', 'bg_color' => 'bg-green-500'],
    ]
];
