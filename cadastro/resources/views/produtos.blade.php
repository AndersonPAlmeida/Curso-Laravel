@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de produtos</h5>
            @if (count($prods) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Estoque</th>
                            <th>Preco</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>                
                        @foreach ($prods as $pod)                      
                            <tr>
                                <td>{{$pod->id}}</td>
                                <td>{{$pod->nome}}</td>
                                <td>{{$pod->estoque}}</td>
                                <td>{{$pod->preco}}</td>
                                {{-- <td>{{$pod->categoria_id}}</td> --}}
                                <td>{{$nomeCategoria[$i++]}}</td>
                                <td>
                                    <a href="/produtos/editar/{{$pod->id}}" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="/produtos/apagar/{{$pod->id}}" class="btn btn-sm btn-danger">Apagar</a>
                                </td>
                            </tr>                           
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
        </div>
    </div>
@endsection