<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuideMe | Prijava</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name"><i class="fa fa-user"></i></h1>
        </div>
        <h3>Dobrodošli u GuideMe</h3>
        <p>Prijavite se kako bi pristupili administraciji sustava.</p>
        @if (Session::has('msg'))
            <div class="alert alert-{{{Session::get('msg_type')}}} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{{Session::get('msg')}}}
            </div>
        @endif
        <form class="m-t" role="form" action="/login" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Korisničko ime" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Lozinka" required>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Prijava</button>

            <a href="#"><small>Zaboravili ste lozinku?</small></a>
            <p class="text-muted text-center"><small>Nemate račun?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="#">Registrirajte se</a>
        </form>
        <p class="m-t"><small>&copy; 2015 TeamCode</small></p>
    </div>
</div>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
