<!DOCTYPE html>
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

    <h1>Showing </h1>

    <div class="jumbotron text-center">
        <h2>COLEÇÃO </h2>


    @foreach($videos as $canal)
        @foreach($canal as $video)

           <h4 id="title">

               <a href='{{url('collections/video')}}/{{$video->id->videoId}}'>
                   {{$video->snippet->title}}    -  data: {{$video->snippet->publishedAt}}<br>
                   <img src="https://i4.ytimg.com/vi/{{$video->id->videoId}}/hqdefault.jpg"/>
                </a>
           </h4>


        @endforeach
    @endforeach
    </div>

</div>
</body>
</html>