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
        <div class="container">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Identificación</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user["id"]}}</td>
                            <td>{{ $user["identification_number"]}}</td>
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
