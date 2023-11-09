<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F7F7F7;
        }
        .titulo {
            text-align: center;
            padding: 0.5px;
            background-color: #007BFF;
            color: white;
        }
        .tabla {
            width: 100%;
            margin: 5px auto;
            border-collapse: collapse;
        }
        .tabla th, .tabla td {
            border: 1px solid #ddd;
            padding: 0px;
            text-align: center;
        }
        .tabla th {
            background-color: #007BFF;
            color: white;
            padding: 5px;
        }
        .fw-semibold {
            font-weight: 600;
        }
        .text-muted {
            color: #6c757d;
        }
        .row-not-space {
            display: flex;
            flex-direction: column;
            gap: 0;
        }
    </style>
    <title>Farmacia Hno Pedro | Reporte</title>
</head>

<body>
    <div class="titulo">
        <h1>Reporte de Ventas</h1>
    </div>
    <br>
    <table class="tabla">
        <thead class="">
            <tr>
                <th>Comprobante</th>
                <th>Cliente</th>
                <th>Fecha y hora</th>
                <th>Vendedor</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $item)
                <tr>
                    <td>
                        <p class="fw-semibold mb-1">{{ $item->comprobante->tipo_comprobante }} {{ $item->numero_comprobante }}</p>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $item->cliente->persona->razon_social }}</p>
                    </td>
                    <td>
                        <div class="row-not-space">
                            <p class="fw-semibold mb-1"><span class="m-1"><i
                                        class="fas fa-calendar"></i></span>{{ \Carbon\Carbon::parse($item->fecha_hora)->format('d-m-Y') }}
                                        {{ \Carbon\Carbon::parse($item->fecha_hora)->format('H:i') }}
                            </p>
                        </div>
                    </td>
                    <td>
                        {{ $item->user->name }}
                    </td>
                    <td>
                        Q. {{ $item->total }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        Total:
                    </td>
                    <td>
                        Q. {{ $ventas->sum('total') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>




