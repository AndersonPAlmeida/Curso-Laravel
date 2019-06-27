@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/produtos/{{$prod->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto" value="{{$prod->nome}}">
                    <label for="estoqueProduto">Estoque do Produto</label>
                    <input type="number" class="form-control" name="estoqueProduto" min="1" max="100" id="estoqueProduto" placeholder="1" value="{{$prod->estoque}}">
                    <label for="precoProduto">Preço do Produto R$</label>
                    <input type="number" class="form-control" name="precoProduto" id="precoProduto" placeholder="5.00" value="{{$prod->preco}}">
                    <label for="categoriaProduto">Categoria do Produto</label>
                    <select class="form-control" name="categoriaProduto" id="categoriaProduto">
                        <option value="0">Escolha</option>
                        @foreach ($cats as $cat)
                            <option @if ($prod->categoria_id == $cat->id) selected @endif value="{{$cat->id}}">{{$cat->nome}}</option>    
                        @endforeach                        
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection