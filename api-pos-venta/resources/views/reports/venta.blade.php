<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Venta</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
            position: relative;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ff8400;
            padding-bottom: 10px;
        }

        .header img {
            max-height: 80px;
        }

        .header div {
            text-align: right;
        }

        .header span {
            display: block;
            font-size: 20px;
        }

        .header span:first-child {
            font-weight: bold;
            font-size: 22px;
            color: #ff8400;
        }

        .section {
            margin-top: 20px;
        }

        .section div {
            margin-bottom: 10px;
        }

        .section strong {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #ff8400;
            color: white;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .total {
            text-align: right;
            padding-right: 20px;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }

        .background-img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50%;
            height: auto;
            opacity: 0.1;
            z-index: -1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <!-- Reemplaza "logo.png" con la ruta de tu imagen de logo -->
            <img class="imgHeader" src="{{ public_path('img/sthil.jpg') }}" alt=""><br>
            <div>
                <span>V E N T A</span>
                <span>N° {{$venta->id}}</span>
                <span>Fecha: {{$venta->fecha}}</span>
            </div>
        </div>

        <div class="section">
            <div><strong>Sucursal:</strong> {{$venta->sucursal->nombre}}</div>
            <div><strong>Cliente:</strong> {{$venta->cliente->nombre}} {{$venta->cliente->paterno}} {{$venta->cliente->materno}}</div>
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

        <div class="footer">
            <p>Gracias por su compra.</p>
        </div>
        <img class="background-img" src="{{ public_path('img/sthil.jpg') }}" alt="Background">
    </div>
</body>

</html>
