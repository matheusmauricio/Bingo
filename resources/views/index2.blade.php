<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gerador de cartelas de bingo online">
    <meta name="keywords" content="bingo, cartela, cartelas, gerador, gerador de bingo, gerador de cartela, gerador de cartelas">
    <meta name="author" content="MM SISTEMAS">
    <meta property="og:title" content="Gerador de Cartelas de Bingo" />
    <meta property="og:description" content="Gerador de cartelas de bingo online" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="URL-da-imagem-de-previa.png" />
    <meta property="og:url" content="{{ url()->current() }}" />

    <title>Gerador de Cartelas de Bingo</title>

    <!-- Referência ao CSS com as cores -->
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">

    <!-- Estilo simples para uma boa visualização -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: var(--background-color); /* Cor de fundo */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            border: 2px solid var(--border-color); /* Cor da borda */
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: var(--primary-color); /* Cor do título */
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: var(--primary-color); /* Cor dos labels */
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid var(--input-border-color); /* Cor da borda dos inputs */
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--focus-color); /* Cor do foco nos inputs */
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: var(--button-color); /* Cor do botão */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: var(--button-hover-color); /* Cor do hover do botão */
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666666;
        }

        .form-footer a {
            color: var(--primary-color); /* Cor dos links */
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .error-message{
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Gerador de Cartelas de Bingo</h1>

        <form action="gerar" method="POST" target="_blank">
            @csrf
            <label for="quantidadeLinhas">Quantidade de linhas</label>
            <input type="text" id="quantidadeLinhas" name="quantidadeLinhas" value="{{ old('quantidadeLinhas') }}" onkeypress="permitirSomenteNumeros(event)" required>

            @if ($errors->has('quantidadeLinhas'))
                <div class="error-message">
                    {{ $errors->first('quantidadeLinhas') }}
                </div>
            @endif

            <label for="quantidadeColunas">Quantidade de colunas</label>
            <input type="text" id="quantidadeColunas" name="quantidadeColunas" value="{{ old('quantidadeColunas') }}" onkeypress="permitirSomenteNumeros(event)" required>

            @if ($errors->has('quantidadeColunas'))
                <div class="error-message">
                    {{ $errors->first('quantidadeColunas') }}
                </div>
            @endif

            <label for="numeroInferior">Menor Número</label>
            <input type="text" id="numeroInferior" name="numeroInferior" value="{{ old('numeroInferior') }}" onkeypress="permitirSomenteNumeros(event)" required>

            @if ($errors->has('numeroInferior'))
                <div class="error-message">
                    {{ $errors->first('numeroInferior') }}
                </div>
            @endif

            <label for="numeroSuperior">Maior Número</label>
            <input type="text" id="numeroSuperior" name="numeroSuperior" value="{{ old('numeroSuperior') }}" onkeypress="permitirSomenteNumeros(event)" required>

            @if ($errors->has('numeroSuperior'))
                <div class="error-message">
                    {{ $errors->first('numeroSuperior') }}
                </div>
            @endif

            <label for="quantidadeCartelas">Quantidade de Cartelas</label>
            <input type="text" id="quantidadeCartelas" name="quantidadeCartelas" value="{{ old('quantidadeCartelas') }}" onkeypress="permitirSomenteNumeros(event)" required>

            @if ($errors->has('quantidadeCartelas'))
                <div class="error-message">
                    {{ $errors->first('quantidadeCartelas') }}
                </div>
            @endif

            <button type="submit">Gerar</button>
        </form>
    </div>

    <script>
        function permitirSomenteNumeros(event) {
            // Regex para permitir apenas números
            const regex = /^[0-9]*$/;
            // O que foi digitado pelo usuário
            const key = String.fromCharCode(event.keyCode || event.which);

            // Verifica se a tecla pressionada corresponde ao regex
            if (!regex.test(key)) {
                event.preventDefault(); // Impede a entrada
            }
        }
    </script>
</body>
</html>
