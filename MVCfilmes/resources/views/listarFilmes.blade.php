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

        <form method="GET" action="{{ route('filme.listar') }}">
            <input type="text" name="titulo" placeholder="Digite o titulo do Fillme" value="{{ request('titulo') }}">

        <form method="GET" action="{{ route('filme.listar') }}">
            <input type="text" name="data_lancamento" placeholder="Digite a data de lançamento do filme" value="{{ request('data_lancamento') }}">

            <button type="submit"> buscar </button>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card p-4 mb-5">

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

                        @foreach ($filmes as $filme)
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