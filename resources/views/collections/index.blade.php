<html>
<head>
    <title>YOUCOLLECTIONS</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('collections') }}">Nerd Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('collections') }}">View All Nerds</a></li>
            <li><a href="{{ URL::to('collections/create') }}">Create a Nerd</a>
        </ul>
    </nav>

    <h1>COLLECTIONS</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Collection</td>
            <td>Canais</td>
            <td>id User</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($collec as $key => $value)
            <tr>
                <td>{{ $value->idCollec }}</td>
                <td>{{ $value->nomeCollec }}</td>
                <td>{{ $value->canais }}</td>
                <td>{{ $value->idUser }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('collections/'.$value->idCollec) }}">Abrir coleção</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('collections/' . $value->idCollec . '/edit') }}">Editar Coleção</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>