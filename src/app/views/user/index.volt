<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
                                       initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reste Assis T'es Posé</title>

    <!-- Bootstrap core CSS -->
    <link href="public/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/css/main.css" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900'
          rel='stylesheet' type='text/css'>

    <link
            rel="stylesheet"
            href="http://code.jquery.com/ui/1.9.0/themes/smoothness/jquery-ui.css" />
</head>

<body>
<!-- Fixed navbar -->
<header class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"
                    data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><b>Reste Assis T'es Posé</b></a>
        </div>
         <ul class="nav navbar-nav navbar-right">
                <li><a href="login">Déjà membre ?</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="user/create">Créer un compte</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</header>
<div id="content">
Tu es co {{ user.mail }}
</div>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>