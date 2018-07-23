<?php

namespace estoque\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use estoque\Produto;

class ProdutoController extends Controller{
    public function lista()
    {
        $produtos = DB::select('select * from produtos');

        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra($id){
        $resposta =
            DB::select('select * from produtos where id = ?', [$id]);
        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta[0]);
    }
    public function novo(){
        return view('produto.formulario');
    }
    public function adiciona(){
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        DB::insert('insert into produtos (nome, descricao, valor, quantidade) values (?,?,?,?)',
            array($nome, $descricao, $valor, $quantidade));

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }
    public function listaJson(){
        $produtos= DB::select('select * from produtos');
        return response()->json($produtos);
    }
}