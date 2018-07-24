@extends('templates.principal')
@section('conteudo')
            @if(empty($produtos))
                <div class="alert alert-danger">
                    Você nâo tem nenhum produto cadastrado.
                </div>
            @else
                <h1>Listagem de produtos</h1>
                <table class="table table-bordered">
                    <tr>
                        <td>Nome</td>
                        <td>Valor</td>
                        <td>Descrição</td>
                        <td>Quantidade</td>
                    </tr>
                    @foreach ($produtos as $p)
                        <tr class="{{ $p->quantidade <= 1 ? 'danger' : ''}}">
                            <td>{{$p->nome}} </td>
                            <td>{{$p->valor}} </td>
                            <td>{{$p->descricao}} </td>
                            <td>{{$p->quantidade}} </td>
                            <td><a href="/produtos/mostra/{{$p->id}}"><span class="glyphicon glyphicon-search"></span></a></td>
                            <td><a href="{{action('ProdutoController@remove', $p->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
                            <td><a href="/produtos/alterar/{{$p->id}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        </tr>
                    @endforeach
                </table>
            @endif
            <h4>
                <span class="label label-danger pull-right">Um ou menos itens no estoque</span>
            </h4>
            @if(old('nome'))
            <div class="alert alert-success">
                <strong>Sucesso!</strong> O produto {{old('nome')}} foi adicionado.
            </div>
            @endif
            @if(old('id'))
            <div class="alert alert-success">
                <strong>Sucesso!</strong> O produto {{old('id')}} foi alterado.
            </div>
            @endif
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    @if($error == "Deletado")
                        <div class="alert alert-danger">
                            <strong>O produto foi removido com sucesso! :D</strong>.
                        </div>
                    @endif
                @endforeach
            @endif
@stop