<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filmes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="mb-4">Filmes</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card p-4 mb-5">

        <h3>Cadastrar Filme</h3>

        <form action="{{ route('filme.add') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Título</label>
                <input type="text" name="titulo" class="form-control">
            </div>

            <div class="mb-3">
                <label>Data Lançamento</label>
                <input type="date" name="data_lancamento" class="form-control">
            </div>

            <div class="mb-3">
                <label>Sinopse</label>
                <textarea name="sinopse" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Gênero</label>
                <input type="text" name="genero" class="form-control">
            </div>

            <div class="mb-3">
                <label>Orçamento</label>
                <input type="number" name="orcamento" class="form-control">
            </div>

            <div class="mb-3">
                <label>Autor</label>

                <select name="autor_id" class="form-select">

                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}">
                            {{ $autor->nome }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button class="btn btn-success">
                Cadastrar Filme
            </button>

        </form>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data</th>
                <th>Sinopse</th>
                <th>Gênero</th>
                <th>Orçamento</th>
                <th>Autor</th>
            </tr>
        </thead>

        <tbody>

            @foreach($filmes as $filme)

            <tr>
                <td>{{ $filme->id }}</td>
                <td>{{ $filme->titulo }}</td>
                <td>{{ $filme->data_lancamento }}</td>
                <td>{{ $filme->sinopse }}</td>
                <td>{{ $filme->genero }}</td>
                <td>R$ {{ $filme->orcamento }}</td>
                <td>{{ $filme->autor->nome ?? 'Sem Autor' }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>