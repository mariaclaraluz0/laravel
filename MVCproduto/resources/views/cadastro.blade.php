<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produtos</title>
</head>
<body  style="font-family: 'Arial', sans-serif;" >
    <h1>Cadastro Produtos</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('produto.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome" require value="{{old('nome')}}">
        <br><br>

        <label for="quantidade">Quantidade: </label>
        <input type="int", name="quantidade" placeholder="quantidade" require value="{{old('quantidade')}}">
        <br><br>

        <label for="preco">Preço: </label>
        <input type="double" name="preco" id="preco" placeholder="preco" require value="{{old('preco')}}">
        <br><br>

        <input type="submit" value="Cadastrar" style="background-color: rgb(68, 0, 255); color: white;">
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erroor)
                    <li>{{$errors}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>