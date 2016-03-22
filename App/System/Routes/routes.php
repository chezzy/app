<?php return [
    //'news/([a-z]+)/[0-9]+)' => 'news/view/$1/$2', //news/sport/1234
    'news/([0-9]+)' => 'news/view/$1', //news/1234
    'news' => 'news/index',
];