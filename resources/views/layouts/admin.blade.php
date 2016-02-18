<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('assets/css/knacss.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}">

</head>
<body>
<header id="header">
    <nav class="main-nav">
        <ul>
            <li><a href="{{url('dashboard')}}">Retour à la page d'accueil</a></li>
            <li><a href="">Logout</a></li>
        </ul>
    </nav>
</header>
<div id="main">
    @yield('content')
</div>
<footer id="footer">

</footer>
@section('script')
<script src="{{url('js/lib/jquery.min.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
@show
</body>
</html>