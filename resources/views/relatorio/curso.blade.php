<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    ds
    @if (isset($dados))
        <h1>{{$dados['curso']}}</h1>

        @foreach ($dados['alunos'] as $aluno )
            <p>{{$aluno}}</p>
        @endforeach

        <p>{{$dados['duração']}}</p>
    @endif
</body>
</html>
