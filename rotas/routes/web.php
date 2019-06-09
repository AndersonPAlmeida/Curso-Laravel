<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return "<h1>Laravel</h1>";
});

Route::get('/ola', function () {
    return "<h1>Seja Bem Vindo</h1>";
});

Route::get('/ola/sejabemvindo', function () {
    return view('welcome');
});

Route::get('/nome/{nome}', function($nome) {
    return "<h1>Olá, $nome</h1>";
});

Route::get('/repetir/{nome}/{n}', function($nome, $n) {
    if (is_integer($n)) {
        for ($i=0; $i < $n; $i++) { 
            echo "<h1>Olá, $nome</h1>";
        }
    }    
    else
        echo "Você não digitou um inteiro";
});

Route::get('/seunomecomregra/{nome}/{n}', function($nome, $n) {
    for ($i=0; $i < $n; $i++) { 
        echo "<h1>Olá, $nome: ($i)</h1>";
    }
})->where('n','[0-9]+')->where('nome','[A-Za-z]+');

Route::get('/seunomesemregra/{nome?}', function($nome=null) {
    if (isset($nome)) {
        echo "<h1>Olá, $nome</h1>";  
    }
    else
        echo "Você não passou nenhum nome";
      
});

Route::prefix('app')->group(function (){
    Route::get('/', function () {
        return "Pagina principal do APP";
    });

    Route::get('/profile', function () {
        return "Pagina profile";
    });

    Route::get('/about', function () {
        return "Pagina about";
    });
});

Route::redirect('/aqui/', '/ola', 301);

Route::view('/viewnome', 'hellonome', ['nome'=> 'Joao', 'sobrenome'=>'Silva']);

Route::get('/hellonome/{nome}/{sobrenome}', function($nome, $n) {
    return view('hellonome', ['nome'=>$nome, 'sobrenome'=>$n]);
});

Route::get('/rest/hello', function() {
    return "Hello (GET)";
});

Route::post('/rest/hello', function() {
    return "Hello (POST)";
});

Route::delete('/rest/hello', function() {
    return "Hello (DELETE)";
});

Route::put('/rest/hello', function() {
    return "Hello (PUT)";
});

Route::patch('/rest/hello', function() {
    return "Hello (PATCH)";
});

Route::options('/rest/hello', function() {
    return "Hello (OPTIONS)";
});

Route::post('/rest/imprimir', function(Request $req) {
    $nome = $req->input('nome');
    $idade = $req->input('idade');
    return "Hello $nome ($idade)!! (POST)";
});

Route::match(['get','post'], '/rest/hello2', function () {
    return "Hello Word 2";
});

Route::any('/rest/hello3', function () {
    return "Hello Word 3";
});

Route::get('/produtos', function() {
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');

Route::get('/linkprodutos', function() {
    $url = route('meusprodutos');
    echo "<a href=\"". $url ."\">Meus produtos</a>";
});

Route::get('/redirecionarprodutos', function() {
    return redirect()->route('meusprodutos');
});