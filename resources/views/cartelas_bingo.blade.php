<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelas de Bingo</title>
    <style>
        body {
            margin-left: 0.5cm;
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
            margin-right: 0.5cm;

            font-family: 'Open Sans', sans-serif;
            font-size: 12px;
            color: #6a6c6f;
        }

        @page {
            size: A4;
            margin-left: 1cm;
            margin-top: 1cm;
            margin-bottom: 1cm;
            margin-right: 1cm;
            font-family: 'Open Sans', sans-serif;
            font-size: 12px;
            color: #6a6c6f;
        }

        @page {
            /* margin: 100px 25px 100px 25px; */
        }

        .page-break {
            page-break-after: always;
        }

        p:last-child {
            page-break-after: never;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            float: left;
            margin: 10px;
            page-break-inside: auto;
        }

        td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            font-size: 18px;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        thead {
            display: table-header-group
        }

        tfoot {
            display: table-footer-group
        }

        .cartela-container {
            /* display: flex;
            flex-wrap: wrap; */
        }

        h2 {
            text-align: center;
            clear: both;
        }

        .cartela {
            page-break-inside: avoid; /* Evita que a cartela quebre no meio */
        }
    </style>
</head>

<body>
    <div class="cartela-container">
        @foreach ($cartelas as $index => $cartela)
            <div class="cartela">
                {{-- <h2>Cartela {{ $index + 1 }}</h2> --}}
                <h2>&nbsp;</h2>
                <table>
                    @foreach ($cartela as $linha)
                        <tr>
                            @foreach ($linha as $numero)
                                <td>{{ $numero }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        @endforeach
    </div>
</body>

</html>
