<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $_result =  DB::table('posts')->get();
    print_r($_result, true);
    return view('welcome', [
        'items' => [
            'apple', 'banana', 'tomato'
        ],
        'nums' => []
    ]);
});