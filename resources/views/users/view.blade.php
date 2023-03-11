<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
        <title>Transacciones usuarios</title>
    </head>
    <body>
        <div class="row">
            <div class="col-1">
                <a href="{{route('users.index')}}" class="btn btn-primary">Volver</a>
            </div>
            <div class="col">
                <h1 class="text-center">Transacciones</h1>
            </div>
        </div>
        <div class="container mt-3">
            @if($userTransactions->count() > 0)
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <td>ID</td>
                            <td>Cantidad</td>
                            <td>Detalle</td>
                            <td>Fecha creación</td>
                            <td>Última actualización</td>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($userTransactions as $transaction)
                            <tr class="text-center">
                                <td>{{$transaction["id"]}}</td>
                                <td>{{$transaction["amount"]}}</td>
                                <td>{{$transaction["transaction_detail"]}}</td>
                                <td>{{$transaction["created_at"]}}</td>
                                <td>{{$transaction["updated_at"]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $userTransactions->links() }}
            @else
                <div class="mt-4">
                    <h4 class="text-center">No se encontraron transacciones para este usuario</h4>
                </div>
            @endif
        </div>
    </body>
</html>

