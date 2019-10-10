<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Gerador de Cartela de bingo</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/gerar" method="POST" target="_blank">
                    @csrf
                    <div class="form-group">
                        <label for="quantidadeLinhas">Quantidade de linhas</label>
                        <input type="text" class="form-control" id="quantidadeLinhas" name="quantidadeLinhas" aria-describedby="quantidadeLinhas" placeholder="Quantidade de linhas">
                    </div>

                    <div class="form-group">
                        <label for="quantidadeColunas">Quantidade de colunas</label>
                        <input type="text" class="form-control" id="quantidadeColunas" name="quantidadeColunas" aria-describedby="quantidadeColunas" placeholder="Quantidade de colunas">
                    </div>

                    <div class="form-group">
                        <label for="numeroInferior">Número Inferior</label>
                        <input type="text" class="form-control" id="numeroInferior" name="numeroInferior" aria-describedby="numeroInferior" placeholder="Número Inferior">
                    </div>

                    <div class="form-group">
                        <label for="numeroSuperior">Número Superior</label>
                        <input type="text" class="form-control" id="numeroSuperior" name="numeroSuperior" aria-describedby="numeroSuperior" placeholder="Número Superior">
                    </div>

                    <div class="form-group">
                        <label for="numeroCartelas">Quantidade de Cartelas</label>
                        <input type="text" class="form-control" id="numeroCartelas" name="quantidadeCartelas" aria-describedby="quantidadeCartelas" placeholder="Quantidade de Cartelas">
                    </div>

                    <button type="submit" class="btn btn-primary">Gerar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>