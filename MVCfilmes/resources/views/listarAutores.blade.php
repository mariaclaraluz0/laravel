<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Autores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1>Autores</h1>

<form method="GET" action="{{ route('autor.listar') }}">

    <input type="text"
           name="nome"
           placeholder="Digite o nome do Autor"
           value="{{ request('nome') }}">

    <input type="text"
           name="telefone"
           placeholder="Digite o telefone"
           value="{{ request('telefone') }}">

    <button type="submit" class="btn btn-primary">
        Buscar
    </button>

</form>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>{{ $autor->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum autor encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>

</html>