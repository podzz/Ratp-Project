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
    <link href="../public/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/main.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../public/css/create_user.css" rel="stylesheet">
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
            <a class="navbar-brand" href="../index"><b>Reste Assis T'es Posé</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../login">Déjà membre ?</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</header>
<div id="headerwrap">
    {%  if errorMsg is defined %}
        <div class="panel panel-default" style="margin: 20px auto; max-width: 60%; background: lightcyan;">
            <div class="panel-body">
                {{ errorMsg }}
            </div>
        </div>
    {% endif %}
    <h1>Création de compte</h1>
    <form method="post" action="create" style="display: none;">
        <h3>Adresse email</h3><input class="form-control" name="email" type="email" placeholder="exemple@domain.com">
        <h3>Mot de passe</h3><input class="form-control" name="password" type="password" placeholder="********">

        <table class="table table-bordered">
            <tr>
                <td>Nom de l'offre</td>
                <td>
                    Zealot
                </td>
                <td style="background: #246593;">
                    Colossus
                </td>
                <td>
                    Mothership
                </td>
            </tr>
            <tr>
                <td>Nombre d'appels à l'API (par jour)</td>
                <td>100</td>
                <td style="background: #246593;">1000</td>
                <td>10000</td>
            </tr>
            <tr>
                <td>Prix</td>
                <td>5€ / an</td>
                <td style="background: #246593;">40€ / an</td>
                <td>70€ / an</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="radio" name="offer" value="1">
                </td>
                <td style="background: #246593;">
                    <input type="radio" name="offer" value="2"  checked>
                </td>
                <td>
                    <input type="radio" name="offer" value="3">
                </td>
            </tr>
        </table>


        <input type="submit" class="btn btn-success" value="Création du compte">
    </form>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('form').fadeIn('slow');
        $('input[type="radio"]').bind('click', function () {
            for (i = 2; i <= 4 ; i++)
            $('table tr td:nth-child('+ i +')').css('background', (i - 1) == this.value ? '#246593' : '#3498db');
        });
    });
</script>
</body>
</html>