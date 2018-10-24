<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index');
/*Route::get('/', function() {
    return redirect('login');
});*/

Route::get('auth/login', function () {
    $credentials = [
        'email'    => 'jaewoo@naver.com',
        'password' => 'password'
    ];

    if (!auth()->attempt($credentials)) {
        return '로그인 정보가 정확하지 않습니다.';
    }

    return redirect('protected');
});

Route::get('protected', ['middleware' => 'auth', function () {
    dump(session()->all());

    return '어서 오세요' . auth()->user()->name;
}]);

Route::get('logout', function () {
    auth()->logout();

    return '또 봐요ㅎㅎ';
});

Route::resource('articles', 'ArticlesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

