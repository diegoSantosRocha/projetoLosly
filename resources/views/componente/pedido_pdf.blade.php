@if (isset($pedidos))
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pedidos</title>
        <style>
            td, th { border: 1px solid }
        </style>
    </head>

    <body>
        <h1> Pedidos </h1>
        <table>
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Material</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($pedido['created_at'])) }}</td>
                        <td>{{ $pedido['id_fornecedor'] }}</td>
                        <td>{{ $pedido['produto'] }}</td>
                        <td>{{ $pedido['quantidade'] }}</td>
                        <td>{{ $pedido['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
@endif
