<html>
<head>
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</head>
<body>
        @alerta(['tipo'=>'danger','titulo'=>'Erro fatal'])
            <strong>Erro: </strong>  Sua mensagem de erro.
           {{--  @slot('titulo')
                Erro fatal
            @endslot  --}}           
        @endalerta

        @component('components.meucomponente', ['tipo'=>'warning','titulo'=>'Erro fatal'])
            <strong>Erro: </strong>  Sua mensagem de erro.                    
        @endcomponent

        @alerta(['tipo'=>'success','titulo'=>'Erro fatal'])
            <strong>Erro: </strong>  Sua mensagem de erro.        
        @endalerta

        @alerta(['tipo'=>'primary','titulo'=>'Erro fatal'])
            <strong>Erro: </strong>  Sua mensagem de erro.        
        @endalerta

        @alerta(['tipo'=>'secondary','titulo'=>'Erro fatal'])
            <strong>Erro: </strong>  Sua mensagem de erro.        
        @endalerta

        @alerta(['tipo'=>'info','titulo'=>'Erro fatal'])
            <strong>Erro: </strong>  Sua mensagem de erro.        
        @endalerta

        @alerta(['tipo'=>'dark','titulo'=>'Erro fatal'])
            <strong>Erro: </strong>  Sua mensagem de erro.        
        @endalerta
    {{-- <script src="{{asset('js/app.js')}}" type="text/javasscript">
    </script> --}}
    <script src="{{URL::to('js/app.js')}}" type="text/javasscript">
    </script>   
</body>
</html>