<?php

require __DIR__ . '/autoload.php';

$user = \App\Models\User::findAll();

var_dump($user);
