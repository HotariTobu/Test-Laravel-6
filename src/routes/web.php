<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * Hello
 */

Route::get('hello', function () {
    return '<html><body><h1>Hello</h1><p>This is sample page.</p></body></html>';
});

$html = <<<EOF
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>SUPER-HELLO</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>

    <style>
        body {
            font-size: 16pt;
            color: #999;
        }

        h1 {
            font-size: 1000pt;
            text-align: right;
            color: #eee;
            margin: -40px 0 -50px 0;
        }
    </style>
</head>
<body>
    <h1>Hello</h1>
    <p>This is sample page.</p>
    <p>koreha sanpuru de tukutta pe-ji desu</p>
</body>
</html>
EOF;

Route::get('super-hello', function () use ($html) {
    return $html;
});

Route::get('echo/{msg}', function ($msg) {
    return <<<EOF
    <p>msg: {$msg}</p>
    EOF;
});

Route::get('maybe-echo/{msg?}', function ($msg = 'no massage...') {
    return <<<EOF
    <p>msg: {$msg}</p>
    EOF;
});

use App\Http\Controllers\Hello;

// Route::get('hello/index', 'HelloController@index');
Route::get('hello/index', [Hello\HelloController::class, 'index']);

Route::get('hello/user/{id?}/{pass?}', [Hello\HelloController::class, 'user']);

Route::get('multiple-hello', [Hello\MultipleHelloController::class, 'index']);
Route::get('multiple-hello/other', [Hello\MultipleHelloController::class, 'other']);

Route::get('single-hello', Hello\SingleHelloController::class);

Route::get('hello/info', Hello\HelloInfoController::class);


/**
 * Template
 */

Route::get('template/hello', fn () => view('hello.index'));

use App\Http\Controllers\Template;

Route::get('template/hello/controller', Template\HelloController::class);
Route::get('template/hello/controller/param', [Template\HelloController::class, 'param']);

Route::get('template/hello/user/{id?}/{pass?}', fn ($i = 'no-id', $p = 'no-pass') => view('hello.user', ['id' => $i, 'pass' => $p]));

Route::get('template/hello/controller/query', [Template\HelloController::class, 'query']);

Route::get('template/hello/blade/echo', [Template\HelloBladeController::class, 'echo']);

Route::get('template/hello/blade/form', [Template\HelloBladeController::class, 'get']);
Route::post('template/hello/blade/form', [Template\HelloBladeController::class, 'post']);

Route::get('template/hello/blade/cond{msg?}', fn ($m = null) => view('hello.cond', ['msg' => $m]));

Route::get('template/hello/blade/repeat', fn () => view('hello.repeat'));
Route::get('template/hello/blade/loop', fn () => view('hello.loop'));
