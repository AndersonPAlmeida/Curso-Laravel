@extends('layout.meulayout')

@section('minha_secao_produtos')
    @if (isset($palavra))
        Palavras: {{$palavra}}
    @endif
@endsection