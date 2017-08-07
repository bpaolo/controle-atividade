<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Controle de Atividade</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

</head>
    <body>        
        <div class="container">
            @yield('content')
        </div>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.maskedinput-1.3.1.min.js') }}"></script>    
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    </body>
</html>