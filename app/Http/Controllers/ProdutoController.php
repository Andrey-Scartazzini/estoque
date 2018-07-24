<?php

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use estoque\Http\Requests\ProdutosRequest;
use Request;

class ProdutoController extends Controller{
    public function lista()
    {
        $produtos = Produto::all();
        return view('produto.listagem')
            ->with('produtos', $produtos);
    }
    public function mostra($id){
        $produto = Produto::find($id);
        if(empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')
            ->with('p', $produto);
    }
    public function novo(){
        return view('produto.formulario');
    }
    public function adiciona(ProdutosRequest $request){
        Produto::create($request->all());
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
}
    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista')
            ->withErrors(array('Deletado'));
    }
    public function listaJson(){
        $produtos = Produto::all();
        return response()
            ->json($produtos);
    }
    public function alterar($id){
        $produto = Produto::find($id);
        if(empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto.alterar')
            ->with('p', $produto);
    }
    public function atualizar(){
        $produtoad = Request::all();
        $produto = Produto::find($produtoad['id']);
        $produto->fill($produtoad);
        $produto->save();
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('id'));
    }

}