<!DOCTYPE html>
<html>
<head>
    <title>YouCollections</title>
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

    <h1>Edit </h1>

    <!-- if there are creation errors, they will show here -->


    {{ Form::model($collec, array('route' => array('collections.update', $collec->idCollec), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name','nome', array('class' => 'form-control')) }}
    </div>
    {{Form::hidden('hlista','teste')}}
    <div class="form-group">
        {{ Form::label('nerd_level', 'Nerd Level') }}
        {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2'
        => 'Foosball Fanatic', '3' => 'Basement Dweller'),'nerd_level', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Nerd!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>