


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive email layout.">
    <title>YouCollections</title>

    <link rel="stylesheet" href={{ asset('css/pure.css') }} integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">

</head>
<body>






<div id="layout" class="content pure-g">
    <div id="nav" class="pure-u">
        <a href="#" class="nav-menu-button">Menu</a>

        <div class="nav-inner">
            <button class="primary-button pure-button">Perfil</button>

            <div class="pure-menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">Configurações <span class="email-count">(2)</span></a></li>
                    <li class="pure-menu-heading">Collections</li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link"><span class="email-label-personal"></span>Personal</a></li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link"><span class="email-label-work"></span>Work</a></li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link"><span class="email-label-travel"></span>Travel</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="list" class="pure-u-1">
        <div class="email-item email-item-selected pure-g">
            <div class="pure-u">
                <img width="64" height="64" alt="Tilo Mitra&#x27;s avatar" class="email-avatar" src="img/common/tilo-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">Tilo Mitra</h5>
                <h4 class="email-subject">Hello from Toronto</h4>
                <p class="email-desc">
                    Hey, I just wanted to check in with you from Toronto. I got here earlier today.
                </p>
            </div>
        </div>

        <div class="email-item email-item-unread pure-g">
            <div class="pure-u">
                <img width="64" height="64" alt="Eric Ferraiuolo&#x27;s avatar" class="email-avatar" src="img/common/ericf-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">Eric Ferraiuolo</h5>
                <h4 class="email-subject">Re: Pull Requests</h4>
                <p class="email-desc">
                    Hey, I had some feedback for pull request #51. We should center the menu so it looks better on mobile.
                </p>
            </div>
        </div>

        <div class="email-item pure-g">
            <div class="pure-u">
                <img width="64" height="64" alt="Yahoo! News&#x27; avatar" class="email-avatar" src="img/common/ynews-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">Yahoo! News</h5>
                <h4 class="email-subject">Summary for April 3rd, 2012</h4>
                <p class="email-desc">
                    We found 10 news articles that you may like.
                </p>
            </div>
        </div>
    </div>

    <div id="main" class="pure-u-1">
        <div class="email-content">
            <div class="email-content-header pure-g">
                <div class="pure-u-1-2">
                    <h1 class="email-content-title">{{$dados->snippet->title}}<br></h1>
                    <p class="email-content-subtitle">
                        <!-- From <a>{{$dados->snippet->title}}</a> at <span>3:56pm, April 3, 2012</span> -->
                        By <a>{{$dados->snippet->channelTitle}}</a> at <span>{{$dados->snippet->publishedAt}}</span>
                    </p>
                </div>

                <div class="email-content-controls pure-u-1-2">
                    <button class="secondary-button pure-button">Não lida</button>
                    <button class="secondary-button pure-button">Ler depois</button>
                    <button class="secondary-button pure-button">Share</button>
                </div>
            </div>

            <div class="email-content-body">
                <br><iframe src='http://www.youtube.com/embed/{{$dados->id}}' width="640" height="360" allowfullscreen>
                </iframe><br>
                <p> <pre class="descricao"> {{$dados->snippet->description}} </pre><br> </p>
            </div>
        </div>
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
