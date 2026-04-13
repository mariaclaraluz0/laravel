<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>atualizar livros</title>
</head>
<body>
     @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('livro.update', $livro->id) }}" method="POST">
        @csrf
        @method('PUT')


        <label for="nome">Nome do livro: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome"
            require value="{{ old('nome', $livro->nome) }}"
        >   

    <br><br>
        <label for="autor">autor: </label>
        <input type="number" name="autor" id="autor" placeholder="autor"
            required value="{{ old('autor', $livro->autor)}}"
        >

        <br><br>
        <label for="descrição">descrição: </label>
        <input type="number" name="descrição" id="descrição" placeholder="descrição"
            required value="{{ old('descrição', $livro->descrição)}}"
        >

        <br><br>
        <label for="livro_id">Livros: </label>
        <select name="livro_id" id="livro_id">
            @foreach ($livros as $livro)
                <option value="{{ $livro->id }}"
                    {{ $livro->livro_id == $livro->id ? 'selected' : '' }}>
                    {{ $livro->nome }}
                </option>
            @endforeach
        </select>

        <br><br>
        <label for="custo">custo: </label>
        <input type="number" name="custo" id="custo" placeholder="custo"
            required value="{{ old('custo', $livro->custo)}}"
        >

        <br><br>
        <label for="preco">preço: </label>
        <input type="number" name="preco" id="preco" placeholder="preco"
            required value="{{ old('preco', $livro->preco)}}"
        >

        <br><br>
        <label for="imposto">imposto: </label>
        <input type="number" name="imposto" id="imposto" placeholder="imposto"
            required value="{{ old('imposto', $livro->imposto)}}"
        >

        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>