<?php

require __DIR__ . '/autoload.php';

//$news = \App\Models\News::findAll();

//include 'App/Views/index.php';

$user = new \App\Models\User();
$user->email = 'fuck';

$user->insert();