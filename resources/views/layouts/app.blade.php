<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @stack('style')
    <style>
        input#arquivo{
      position: absolute;
      opacity: 0;
      margin: 0px;
      padding-top: 200px;
      width: 250px;
      }
      </style>
    <title>Gerenciador de Contatos</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('contatos.index')}}"><img src="https://static.vecteezy.com/system/resources/previews/000/330/940/non_2x/contacts-glyph-black-icon-vector.jpg" style="width:50px;height:50px" alt="">Gerenciador de Contatos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto"></ul>
          <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{route('contatos.create')}}">Cadastrar Contato</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('contatos.index')}}">Listar Contatos</a>
            </li>
           
          </ul>

          @yield('search')
         
        </div>
      </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        
    function ValidarImagem(formato){
                var formatosPermitidos = ["image/png","image/jpeg","image/jpg","image/gif"];
                var valido = jQuery.inArray(formato, formatosPermitidos);
                if (valido >= 0) {
                    return true;
                }else{
                    return false;
                }
                }


    function CarregarImagem(idtagimagem){
        $('#'.concat(idtagimagem)).change(function(){
                const file = $(this)[0].files[0];
                console.log($(this)[0].files[0]);
                var valido = ValidarImagem(file.type);
                if (valido) {
                const fileReader = new FileReader();
                fileReader.onloadend = function(){
                    $('#imagem').attr('src',fileReader.result);
                
                }
                fileReader.readAsDataURL(file);
                }else{
                alert(' Formato inválido :(')
                }

            })
    }

    $(function(){
    $("#txtBusca").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table-body tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });



    </script>
    
    @stack('scripts')

</body>
</html>