<?php
return [
    'cache' => config('app.'),
    'database' => [
        'connection' => null,
        'table' => 'shoppingcart',
    ],

    'ttl_cart' => 3600,

    'format' => [
        'decimals' => 2,
        'decimal_point' => '.',
        'thousand_seperator' => ','
    ],
];