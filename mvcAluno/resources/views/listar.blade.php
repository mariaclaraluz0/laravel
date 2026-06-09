<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Alunos</title>
</head>
<body>

    <h1>Relatório de Alunos</h1>

    <a href="{{ route('aluno.cadastro') }}">+ Cadastrar Novo Aluno</a>

    <br><br>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>ID TURMA</th>
                <th>SÉRIE</th>
                <th>SALA</th>
                <th>ATUALIZAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>

        <tbody>
            @forelse($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>

                    <td>{{ $aluno->turma?->id ?? '-' }}</td>
                    <td>{{ $aluno->turma?->serie ?? '-' }}</td>
                    <td>{{ $aluno->turma?->numSala ?? '-' }}</td>

                    <td>{{ $aluno->info?->id ?? '-' }}</td>
                    <td>{{ $aluno->info?->endereco ?? '-' }}</td>
                    <td>{{ $aluno->info?->telefone ?? '-' }}</td>
                    <td>{{ $aluno->info?->idade ?? '-' }}</td>
                    <td>{{ $aluno->info?->data ?? '-' }}</td>
                    

                    <td>
                        <a href="{{ route('aluno.editar', $aluno->id) }}">
                            Atualizar
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('aluno.deletar', $aluno->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="8">Nenhum aluno encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>