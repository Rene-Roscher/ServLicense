<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('licensor.dashboard'));
});

//Breadcrumbs::for('license', function ($trail) {
//    $trail->parent('dashboard');
//    $trail->push('Lizenzen', route('home'));
//});

