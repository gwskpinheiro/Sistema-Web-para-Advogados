<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
     <title>Upload de Documento</title>
</head>
    <body>
        <h1>Envio de Documento</h1>
        @if(session('mensagem'))
            <p style="color: green">{{ session('mensagem') }}</p>
        @endif

        @if($errors->any())
            <ul style="color: red">
                @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
        @endforeach
            </ul>

        @endif
            <form action="{{ route('documentos.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <label for="documento">Selecione um arquivo PDF:</label>
                <input type="file" name="documento" id="documento"
                accept="application/pdf">
                <button type="submit">Enviar</button>
            </form>
    </body>
</html>
