<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body  style="font-family: 'Arial', sans-serif;">
    <h1>Relatorio de Setores</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>SETOR</th>
                <th>N° CORREDOR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($setores as $setor)
                <tr>
                    <td>{{$setor->id }}</td>
                    <td>{{$setor->nome }}</td>
                    <td>{{$setor->numCorredor }}</td>
            @empty
                <tr>
                    <td conspan="3">Nenhum setor encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>