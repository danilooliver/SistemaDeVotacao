<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Enquetes</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <!-- Bulma Version 0.7.1-->
    <link rel="stylesheet" href={{ asset("css/bulma.min.css")}} />
    <link rel="stylesheet" type="text/css" href={{ asset("css/style.css")}}>
    <link rel="stylesheet" type="text/css" href={{ asset("css/hero.css")}}>
    <link rel="stylesheet" href={{ asset("css/modal-fx.min.css")}} />
    <link rel="stylesheet" href={{ asset("css/sistemadevotacao.css")}} />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />



    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"></script>

</head>

<body>
<!--------------------------------------NAV BAR-------------->
<nav class="navbar is-transparent">
    <div class="navbar-brand">
        <a class="navbar-item" href="/" style="padding-left:120px; padding-top:45px">
            <img src={{ asset("image/logo-assinatura.png")}} alt="Logo" class="logo" >
        </a>

    </div>



    <div class="navbar-end" id="navbarMenu" style="float:right; position: relative;">

        @if(Auth::user())

        <div class="field is-grouped">
            <div class="navbar-item has-dropdown is-hoverable" >
                <a class="navbar-link image">

                    <span style="color:#3bbfb8; padding-left:10px">{{ Auth::user()->name }}<i class="fas fa-sort-down" ></i> </span>
                </a>

                </a>

                <div class="navbar-dropdown navbar-menu" >
                    <a href="painel" class="navbar-item">
                        Painel
                    </a>

                    <hr class="navbar-divider">
                    <a href="../logout" class="navbar-item">
                        Sair
                    </a>
                </div>

            </div>
        </div>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endif

    </div>

</nav>
<div id="app">
    @yield('content')

</div>
<script src="{{ asset('js/app.js') }}"></script>

</body>
