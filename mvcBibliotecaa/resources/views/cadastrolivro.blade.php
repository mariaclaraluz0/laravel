<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cadastro livros </title>
</head>
<body>
    <h1>cadastro de livros</h1>

    <br>
    <a href="{{route('livro.listar')}}">Listar livro</a>
    <br>

     @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('livro.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome"
            require value="{{ old('nome') }}"
        >
        <br></br>

        <label for="autor">Autor: </label>
        <input type="text" name="autor" id="autor" placeholder="Autor"
            require value="{{ old('autor') }}"
        >
        <br></br>

        <label for="descrição">Descrição: </label>
        <input type="text" name="descrição" id="descrição" placeholder="descrição"
            require value="{{ old('descrição') }}"
        >

        <label for="setor_id">Editora:</label>
            <select name="editora_id" id="editora_id" required>
                <option value="" disabled selected>Selecione uma Editora</option>

                @foreach ($editoras as $editora)
                    <option value="{{ $editora->id }}">
                        Editora - {{ $editora->nomeEditora }}
                    </option>
                @endforeach
            </select>
            <br><br>

       <label for="custo">Custo:</label>
            <input type="text" name="custo" id="custo" placeholder="Custo" require value="{{old('custo')}}">
            <br><br>

            <label for="preco">Preço:</label>
            <input type="text" name="preco" id="preco" placeholder="Preço" require value="{{old('preco')}}">
            <br><br>

            <label for="imposto">Imposto:</label><input type="text" name="imposto" id="imposto" placeholder="Imposto" require value="{{old('imposto')}}">
        
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