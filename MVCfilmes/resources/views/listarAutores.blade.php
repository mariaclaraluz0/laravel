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

    <form action="{{ route('autor.add') }}" method="POST" class="mb-5">
        @csrf

        <input type="text" name="nome" placeholder="Nome" class="form-control mb-2">

        <input type="date" name="data_nascimento" class="form-control mb-2">

        <input type="email" name="email" placeholder="Email" class="form-control mb-2">

        <input type="text" name="telefone" placeholder="Telefone" class="form-control mb-2">

        <button class="btn btn-primary">
            Cadastrar
        </button>
    </form>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>

            @foreach($autores as $autor)

            <tr>
                <td>{{ $autor->id }}</td>
                <td>{{ $autor->nome }}</td>
                <td>{{ $autor->email }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>