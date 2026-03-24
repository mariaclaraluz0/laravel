<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Produto</title>
</head>
<body  style="font-family: 'Arial', sans-serif;">
    <h1>Atualizar Produto</h1>

    @if(session('success'))
    <p style="color: green">{{ session('success')}}</p>
    @endif

    <form action="{{ route('produto.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nome" placeholder="Nome" value="{{ old('nome, $produto->nome')}}" required>
        <br><br>
        <input type="numeric" name="quantidade" placeholder="Quantidade" value="{{ old('quantidade, $produto->quantidade')}}" required>
        <br><br>
        <input type="numeric" name="preco" placeholder="Preço" value="{{ old('preco, $produto->preco')}}" required>
        <br><br>
        <button type="submit" style="background-color: rgb(68, 0, 255); color: white;">Atualizar</button>
    </form>

    @if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{$erro}}</li>
            @endforeach
        </ul>
    </div>
        
    @endif
</body>
</html>