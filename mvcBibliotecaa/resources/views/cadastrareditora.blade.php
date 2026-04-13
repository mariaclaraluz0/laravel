<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Editora</title>
</head>
<body>
    <header>
        <h1>Cadastrar Editora</h1>

        <br>
    <a href="{{route('listar.editora')}}">Listar editora</a>
    <br>
    </header>

    <main>
        <form action="#" method="POST">
            @csrf
            
            <label for="nome">Nome:</label>
            <input type="text" name="nomeEditora" id="nomeEditora" placeholder="Nome da Editora" 
            require value="{{old('nomeEditora')}}">
            <br><br>

            <label for="cnpj">CNPJ:</label>
            <input type="number" name="cnpj" id="cnpj" placeholder="CNPJ"
             require value="{{old('cnpj')}}">
            <br><br>

            <label for="pais">País:</label>
            <input type="text" name="pais" id="pais" placeholder="País"
             require value="{{old('pais')}}">
            <br><br>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" placeholder="Cidade " 
            require value="{{old('cidade')}}">
            
            <button type="submit">Cadastrar</button>
        </form>

        @if($errors->any())
            <div style="color:red">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </main>
    
</body>
</html>