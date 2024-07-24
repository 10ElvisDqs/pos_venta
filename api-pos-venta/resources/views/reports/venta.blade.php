<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Venta</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #666;
            padding-bottom: 10px;
        }

        .header img {
            max-height: 100px;
        }

        .header div {
            text-align: right;
        }

        .header span {
            display: block;
            font-size: 18px;
        }

        .header span:first-child {
            font-weight: bold;
        }

        .section {
            margin-top: 20px;
        }

        .section div {
            margin-bottom: 10px;
        }

        .section strong {
            display: inline-block;
            width: 100px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #666;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f0f0f0;
        }

        .total {
            text-align: right;
            padding-right: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
         <!-- Reemplaza "logo.png" con la ruta de tu imagen de logo -->
            <div>
                <span>V E N T A</span>
                <span>N° {{$venta->id}}</span>
                <span>Fecha: {{$venta->fecha}}</span>
            </div>
        </div>

        <div class="section">
            <div><strong>Sucursal:</strong> {{$venta->sucursal->nombre}}</div>
            <div><strong>Cliente:</strong> {{$venta->cliente}}</div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Artículo</th>
                    <th>Categoría</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1; ?>
                @foreach($venta->venta_inventarios as $d)
                <tr>
                    <td>{{$n}}</td>
                    <td>{{$d->inventario->articulo->nombre}}</td>
                    <td>{{$d->inventario->articulo->categoria->nombre}}</td>
                    <td>{{$d->cantidad}}</td>
                    <td>{{$d->precio}}</td>
                    <td>{{$d->precio * $d->cantidad}}</td>
                </tr>
                <?php $n++; ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td class="total">TOTAL</td>
                    <td class="total">{{$venta->total}}</td>
                </tr>
            </tfoot>
        </table>

        <div class="section">
            <div><strong>Total a Cancelar:</strong> {{$venta->total}}</div>
        </div>
    </div>
</body>

</html>