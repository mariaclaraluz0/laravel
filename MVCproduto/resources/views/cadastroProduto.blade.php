<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produto</title>
</head>
<body>
    <h1>Cadastro Produto</h1>

    <br>
    <a href="{{route('produto.listar')}}">Listar Produto</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('produto.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="quantidade">Quantidade: </label>
        <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade..."
            required value="{{ old('quantidade')}}"
        >
        <br><br>
        <label for="valor">Valor: </label>
        <input type="number" name="valor" id="valor" placeholder="Valor..."
            required value="{{ old('valor')}}"
        >

        <br><br>
        <label for="setor_id">Setores: </label>
        <select name="setor_id" id="setor_id">
            @foreach ($setores as $setor)
                <option value="{{$setor->id}}">{{$setor->nome}}</option>
            @endforeach
        </select>

        <br><br>
        <label for="descricao">Descricao: </label>
        <input type="text" name="descricao" id="descricao" placeholder="Descricao..."
            required value="{{ old('descricao')}}"
        >

        <br><br>
        <label for="tamanho">Tamanho: </label>
        <input type="number" name="tamanho" id="tamanho" placeholder="Tamanho..."
            required value="{{ old('tamanho')}}"
        >

        <br><br>
        <label for="peso">Peso: </label>
        <input type="number" name="peso" id="peso" placeholder="Peso..."
            required value="{{ old('peso')}}"
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