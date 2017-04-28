<?php
return [
    'login' => [
        'type' => 2,
    ],
    'logout' => [
        'type' => 2,
    ],
    'post' => [
        'type' => 2,
    ],
    'posts' => [
        'type' => 2,
    ],
    'guest' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'login',
            'logout',
        ],
    ],
    'user' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'guest',
        ],
    ],
    'author' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'post',
            'posts',
            'user',
        ],
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'author',
        ],
    ],
];
