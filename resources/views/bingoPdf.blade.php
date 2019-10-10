<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif!important;
            font-size: 20px!important;
            page-break-after: always!important;
            overflow-x: hidden;
            overflow-y: auto;
            max-width: 1920px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
            display: block;
        }

        div {
            display: block;
        }

        table{
            margin-bottom: 12px!important;
        }

        table, tr, td{
            border: 1px solid black!important;
            border-collapse: collapse!important;
            line-break: normal!important;
        }

        .tabela, .linha, .coluna{
            border: 1px solid black!important;
            border-collapse: collapse!important;
            line-break: loose!important;
        }

        td{
            padding: 5px!important;
        }
    
        .col-xs-4{
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%;
        }
    
    
    </style>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <title>Bingo</title>
</head>
<body>
    <div class="container">
        <div class="row" style="width: 95%!important; margin-top: 10px!important;">
            <div class="col-xs-4" style="">
                @for($a = 0; $a < $quantidadeCartelas; $a++)
    
                    <table class="tabela">
                        <thead> 
                            <tr class="linha">
                                <th colspan="{{$quantidadeColunas}}" style="text-align: center; font-weight: bold;">B I N G O</th>
                            </tr>
                        </thead>
                        @for($i = 0; $i < $quantidadeLinhas; $i++)
                            <tr class="linha" style="text-align: center">
                                @for($j = 0; $j < $quantidadeColunas; $j++)
                                    <td class="coluna" style="text-align: center">{{$cartela[$a][$i][$j]}}</td>
                                @endfor
                            </tr>
                        @endfor

                    </table>

                @endfor
            </div>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>