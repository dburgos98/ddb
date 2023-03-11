<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
        <title>Usuarios</title>
    </head>
    <body>
        <h1 class="text-center">Listado de usuarios</h1>
        <div class="container mt-3">
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Identificación</th>
                        <th>Número celular</th>
                        <th>Fecha creación</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="text-center">
                            <td>{{ $user["id"]}}</td>
                            <td>{{ $user["identification_number"]}}</td>
                            <td>{{ $user["mobile_number"]}}</td>
                            <td>{{ $user["created_at"]}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('users.view', $user['id'])}}">Ver usuario</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </body>
</html>
