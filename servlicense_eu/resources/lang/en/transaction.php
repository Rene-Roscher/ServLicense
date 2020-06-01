<?php

return [

    'type' => [
        'PAYPAL' => 'PayPal',
        'PAYSAFECARD' => 'paysafecard',
        'SOFORT_TRANSFER' => 'Sofortüberweisung',
        'CREDITCARD' => 'Kreditkarte',
        'SYSTEM' => 'Interne Transaktion'
    ],

    'state' => [
        'PENDING' => 'Ausstehend',
        'SUCCESS' => 'Erfolgreich',
        'ERROR' => 'Fehlerhaft'
    ],

];