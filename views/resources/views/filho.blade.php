@extends('layout.app')

@section('titulo', 'Minha página - Filho')

@section('barralateral')
    @parent
    <p>Esta parte da seção é do Filho</p>
@endsection

@section('conteudo')
    <p>Este é o conteúdo do filho.</p>
@endsection