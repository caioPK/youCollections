<!DOCTYPE html>
<html>
<head>
    <title>YOUCOLLECTIONS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
    <link rel="stylesheet" href={{ asset('css/pure.css') }} integrity="sha384-" crossorigin="anonymous">



</head>
<body>
<div id="layout" class="content pure-g">
    <div id="nav" class="pure-u">
        <a href="" class="nav-menu-button">menu</a>

        <nav class="nav-inner">
            <a class="pure-menu-link" href="{{ URL::to('collections') }}">Nerd Alert</a>

            <div class="pure-menu">
                <ul class="peru-menu-list" style= 'list-style-type:none'>
                    <li class="pure-menu-item">
                        <a class="pure-menu-link" href="{{ URL::to('collections') }}">View All Nerds</a>
                    </li>
                    <li class="pure-menu-item">
                        <a class="pure-menu-link" href="{{ URL::to('collections/create') }}">Create a Nerd</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

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
<script src="https://yui-s.yahooapis.com/3.18.1/build/yui/yui-min.js"></script>
<script>
    YUI().use('node-base', 'node-event-delegate', function (Y) {

        var menuButton = Y.one('.nav-menu-button'),
            nav        = Y.one('#nav');

        // Setting the active class name expands the menu vertically on small screens.
        menuButton.on('click', function (e) {
            nav.toggleClass('active');
        });

        // Your application code goes here...

    });
</script>
</body>
</html>