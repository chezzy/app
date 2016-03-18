<?php

require __DIR__ . '/autoload.php';

$app = new App\Controllers\FrontController();
$app->run();