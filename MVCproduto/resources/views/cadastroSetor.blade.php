<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Setor</title>
</head>
<body>
    <h1>Cadastro Setor</h1>

    <br>
    <a href="{{route('produto.listar')}}">Listar Produto</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('setor.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="num_setor">Numero setor: </label>
        <input type="number" name="num_setor" id="num_setor" placeholder="Numero Setor..."
            required value="{{ old('num_setor')}}"
        >

        <input type="submit" value="Cadastrar">
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
</body>
</html>