@extends('templates.principal')
@section('conteudo')
<h1>Novo produto</h1>
<form action="/produtos/atualizar" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="id" value="{{$p->id}}">
    <div class="form-group">
        <label>Nome</label>
        <input name="nome" value="{{$p->nome}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Descricao</label>
        <input name="descricao" value="{{$p->descricao}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input name="valor" value="{{$p->valor}}" class="form-control">
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input type="number" name="quantidade" value="{{$p->quantidade}}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
@stop