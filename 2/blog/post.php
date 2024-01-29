<?php

$post = [
    'title' => 'un faux titre',
    'frenchCreationDate' => '03/02/2024',
    'content' => 'contenu fake'
];

$comments = [
    [
    'author' => 'Guillaume Debas',
    'frenchCreationDate' => '03/02/2024',
    'comment' => 'BG'
],
[
     'author' => 'Anna J.',
    'frenchCreationDate' => '03/02/2024',
    'comment' => 'Lol'
]
];

require('templates/post.php');