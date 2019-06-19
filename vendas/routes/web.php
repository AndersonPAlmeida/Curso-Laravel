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
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
    $cats = DB::table('categorias')->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    $nomes = DB::table('categorias')->pluck('nome');
    foreach ($nomes as $nome) {
        echo "$nome <br>";
    }
    echo "<hr>";

    $cats = DB::table('categorias')->where('id',1)->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    $cats = DB::table('categorias')->where('id',1)->first();
    echo "id: ". $cats->id. "; ";
    echo "nome: ". $cats->nome. "<br>";
    echo "<hr>";

    echo "<p>Retorna array com like</p>";
    $cats = DB::table('categorias')->where('nome','like','p%')->get();    
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    echo "<p>Setenças logicas</p>";
    $cats = DB::table('categorias')->where('id',1)->orWhere('id',2)->get();    
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    echo "<p>Intervalo</p>";
    $cats = DB::table('categorias')->whereBetween('id',[1,2])->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    echo "<p>Intervalo2</p>";
    $cats = DB::table('categorias')->whereNotBetween('id',[1,2])->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    echo "<p>Conjuntos</p>";
    $cats = DB::table('categorias')->whereIn('id',[1,3,4])->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    echo "<p>Conjuntos2</p>";
    $cats = DB::table('categorias')->whereNotIn('id',[1,3,4])->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    echo "<p>Setenças logicas</p>";
    $cats = DB::table('categorias')->where([
        ['id',1],
        ['nome','Roupas']
    ])->get();    
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    echo "<p>Ordenando por nome</p>";
    $cats = DB::table('categorias')->orderBy('nome')->get();    
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    echo "<p>Ordenando por nome (decrescente)</p>";
    $cats = DB::table('categorias')->orderBy('nome','desc')->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
});

Route::get('/novascategorias', function () {
    $id = DB::table('categorias')->insertGetId(
        ['nome'=>'Carros']
    );
    echo "Novo ID = $id <br>";
});

Route::get('/atualizandocategorias', function () {
    $cat = DB::table('categorias')->where('id',1)->first();
    echo "<p>Antes da atualização</p>";
    echo "id: ". $cat->id. "; ";
    echo "nome: ". $cat->nome. "<br>";

    DB::table('categorias')->where('id',1)->update(['nome'=>'Roupas infantis']);
    $cat = DB::table('categorias')->where('id',1)->first();
    echo "<p>Depois da atualização</p>";
    echo "id: ". $cat->id. "; ";
    echo "nome: ". $cat->nome. "<br>";
});

Route::get('/removendocategorias', function () {
    echo "<p>Antes da remoção</p>";
    $cats = DB::table('categorias')->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
    echo "<hr>";

    // DB::table('categorias')->where('id',2)->delete();
    // DB::table('categorias')->whereNotIn('id',[1,2,3,4,5,6])->delete();
    DB::table('categorias')->delete();
    echo "<p>Depois da remoção</p>";
    $cats = DB::table('categorias')->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id. "; ";
        echo "nome: ". $cat->nome. "<br>";
    }
});