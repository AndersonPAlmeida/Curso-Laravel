<html>
<head>
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</head>
<body>
    @if (isset($produtos))
        @if (count($produtos) == 0)
            <h1>Nenhum Produto</h1>
        @elseif(count($produtos) === 1)
            <h1>Um Produto</h1>
        @else
            <h1>Temos vários Produtos</h1>
        @endif

        @foreach ($produtos as $p)
            <p>Nome: {{$p}}</p>
        @endforeach
    @else
        <h2>Varável produtos não foi passada como parâmetros</h2>
    @endif

    @empty($produtos)
        <h2>Nada em produtos.</h2>
    @endempty
    <script src="{{URL::to('js/app.js')}}" type="text/javasscript">
    </script>   
</body>
</html>