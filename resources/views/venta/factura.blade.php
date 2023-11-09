<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            text-align: center;
            padding: 1px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        main {
            padding: 20px;
        }

        div {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        .td-subtotal {
            font-weight: bold;
        }
    </style>
    <title>Farmacia Hno Pedro | Factura</title>
</head>

<body>
    <header>
        <h1>
            FACTURA
        </h1>
    </header>
    <main>
        <div>
            <p>
                FARMACIA HERMANO PEDRO
                <br>
                Coatepeque
                <br>
                NIT:
            </p>
        </div>
        <div>
            Operacion: Venta
        </div>
        <div>
            <p>
                Cliente: {{ $factura->cliente->persona->razon_social }}
                <br>
                NIT: {{ $factura->cliente->persona->nit }}
                <br>
                Dirección: {{ $factura->cliente->persona->direccion }}
            </p>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Producto</th>
                        <th>Precio de venta</th>
                        <th>IVA</th>
                        <th>Subtotal</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factura->productos as $item)
                        <tr>
                            <td>
                                {{ $item->pivot->cantidad }}
                            </td>
                            <td>
                                {{ $item->nombre }}
                            </td>
                            <td>
                                {{ $item->pivot->precio_venta }}
                            </td>
                            <td>
                                {{ $factura->impuesto }}
                            </td>
                            <td>
                                {{ $item->pivot->cantidad * $item->pivot->precio_venta }}
                            </td>
                            <td class="td-subtotal">
                                {{ $factura->total }}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                Total:
                            </td>
                            <td>
                                Q. {{ $factura->sum('total') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <p>
                Total Pagado: Q. {{ $factura->total }}
                <br>
                Efectivo: Q
                <br>
                Cambio: Q
            </p>
        </div>
        <div>
            <p>
                Cajero: {{ $factura->user->name }}
                <br>
                Factura: {{ $factura->numero_comprobante }}
                <br>
                Fecha: {{ $factura->fecha_hora }}
            </p>
        </div>
    </main>
</body>

</html>
