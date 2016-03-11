<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\News::findAll();

include 'App/Views/index.php';
