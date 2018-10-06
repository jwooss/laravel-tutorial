<?php

Route::get('/', function () {
    return view('master', [
        'items' => [
            'apple', 'banana', 'tomato'
        ],
        'nums' =>''
    ]);
});