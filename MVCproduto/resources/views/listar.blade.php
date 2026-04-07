<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body  style="font-family: 'Arial', sans-serif;">
    <h1>Relatorio de Produtos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>QUANTIDADE</th>
                <th>PRECO</th>
                <th>ID PRODUTO</th>
                <th>SETOR</th>
                <th>Nº CORREDOR</th>
                <th>ATUALIZAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>{{$produto->id }}</td>
                    <td>{{$produto->nome }}</td>
                    <td>{{$produto->quantidade }}</td>
                    <td>{{$produto->preco }}</td>

                    <td>{{ $produto->setor?->id ?? '-' }}</td>
                    <td>{{ $produto->setor?->nome ?? '-' }}</td>
                    <td>{{ $produto->setor?->numCorredor ?? '-' }}</td>
                    <td>
                        <a href="{{route('produto.atualizar', $produto->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{route('produto.deletar', $produto->id)}}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td conspan="3">Nenhum produto encontrado</td>
                </tr>
            @endforelse

            <table border="1">
        <thead>
            <tr>
                <th>DESCRIÇÃO</th>
                <th>TAMANHO</th>
                <th>PESO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($setores as $setor)
                <tr>
                    <td>{{$setor->descricao }}</td>
                    <td>{{$setor->tamanho }}</td>
                    <td>{{$setor->peso }}</td>
                        <a href="{{route('detalheProduto.atualizar', $detalheProduto->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{route('detalheProduto.deletar', $detalheProduto->id)}}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td conspan="3">Nenhum produto encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>