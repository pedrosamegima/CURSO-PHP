<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;

//ROTAS USANDO CONTROLLER
Route::get('/', [PrincipalController::class, 'principal'])-> name('site.index'); // Ta criando uma rota onde ele recebe o controller e recebe a função que foi criada dentro dele

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'Contato'])->name('site.contato');

Route::get('/login', function () { return 'login'; })->name('site.login');

//Agrupando rotas
Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () { //Criando uma rota web, onde ela retorna uma view com a frase abaixo
        return 'clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', function () { //Criando uma rota web, onde ela retorna uma view com a frase abaixo
        return 'fornecedores';
    })->name('app.fornecedores');
    Route::get('/produtos', function () { //Criando uma rota web, onde ela retorna uma view com a frase abaixo
        return 'produtos';
    })->name('app.produtos'); //nome da rota dentro do codigo
});

//Criando uma rota web, onde ela retorna uma view com a frase abaixo

//Route::get('/login', [LoginController::class, 'Login']);

//Route::get('/clientes', [ClientesController::class, 'Clientes']);

//Route::get('/fornecedores', [FornecedoresController::class, 'Fornecedores']);

//Route::get('/produtos', [ProdutosController:: class, 'Produtos']);



/*  CRIANDO ROTA DE FORMA PADRÃO SEM USAR CONTROLLER
Route::get('/', function () { //Criando uma rota web, onde ela retorna uma view com a frase abaixo
    return 'Olá, seja bem vindo ao curso';
});

Route::get('/sobre-nos', function(){// Criando rota pra pagina sobre nós
    return "Sobre nós";
});

Route::get('/contato', function(){ //Criando rota pra retornar a pagina Contatos
    return 'Contatos';
});
*/

//ROTA POR PARAMETRO
Route::get('/contato/{nome}/{mensagem?}', function (String $nome, string $mensagem = 'não informada'){ // O parametro esta entre {}. Dentro da function difinimos o tipo
    echo "Estamos aqui .$nome  - $mensagem"; // ? indica que não é obrigatório
});

//tratando rotas com expressão regulares
Route::get('/contato/{nome}/{categoria_id}',
    function (
        String $nome,
        int $categoria_id = 1){
    echo "Estamos aqui .$nome  - $categoria_id";
}) -> where('categoria_id', '[0-9]+') //estamos defindo o que o parametro recebe. Ele precisa receber. Se não da erro
-> where('nome', '[A-Za-z]+]'); //precisa receber uma letra, se receber num da 404
