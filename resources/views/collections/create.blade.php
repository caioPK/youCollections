<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('collections') }}">View All Nerds</a></li>
            <li><a href="{{ URL::to('collections/create') }}">Create a Nerd</a>
        </ul>
    </nav>

    <h1>Create a Nerd</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::open(array('url' => 'collections')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name','nome', array('class' => 'form-control')) }}
    </div>

        <input type="hidden" name="hlista" id="hlista", value="teste">


    <div class="form-group">

        <!-- tabela a lista de canais e lsita de canais adicionados-->
        <table class="table" id="canais">
            <thead>
                <th> Canais</th>
                <th>Coleção</th>
            </thead>
            <tbody>
                   <tr>
                       <td>
                      <!-- Celula que contem uma tabela com a lista de canais -->
                       <table class="table">
                           <THEAD><th>Nome</th></THEAD>
                           <tbody>

                           @foreach($xml->body->outline->outline as $canal)
                               <tr>
                                   <td>{{$canal[0]['text']}}</td>
                                   <td>
                                       <a class="btn btn-small btn-success" id="novocanal"
                                          onclick="this.disabled=true;insere(
                                                  '{{$xml->body->outline->outline[ $loop->index ]['xmlUrl']}}',
                                                  '{{$xml->body->outline->outline[ $loop->index ]['text']}}'
                                          )">Add</a>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                       </td>
                       <td>
                           <!--  lsita de canais adicionados-->
                           <ul id="listCanal">
                               <li >
                                   <p id="listaurl"></p>
                               </li>
                           </ul>
                       </td>
                   </tr>

            </tbody>
        </table>
    </div>
    <input type="submit" value="Criar Coleção" class="btn btn-primary" onclick="enviar()">


    {{ Form::close() }}

</div>
    <script type="text/javascript">


        var listastring='';
        function enviar() {
            document.getElementById('hlista').value = listastring;
        }
        function insere (a,b) {

            listastring = listastring + "@" + a.replace ("https://www.youtube.com/feeds/videos.xml?channel_id=", "");
            document.getElementById("listaurl").innerHTML =listastring;
            var ul = document.getElementById("listCanal");
            var li = document.createElement("li");
            li.appendChild(document.createTextNode(b));
            ul.appendChild(li);
        }
    </script>
</body>
</html>