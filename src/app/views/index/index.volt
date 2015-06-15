{% set logged = (email is defined) and (token is defined) %}
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

    <link href="public/css/bootstrap.css" rel="stylesheet">

    <link href="public/css/main.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900'
          rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/smoothness/jquery-ui.css" />
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
            <a class="navbar-brand" href="index"><b>Reste Assis T'es Posé</b></a>
        </div>
        <div class="navbar-collapse collapse">
            {% if not logged %}
                <ul class="nav navbar-nav navbar-right">
                    <li>{{ link_to('login', 'Déjà membre ?') }}</li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>{{ link_to('user/create', 'Créer un compte') }}</li>
                </ul>
            {% else %}
                <ul class="nav navbar-nav navbar-right">
                    <li>{{ email }}</li>
                </ul>
            {% endif %}

        </div><!--/.nav-collapse -->
    </div>
</header>

<div id="headerwrap">
    <div class="container">
        <div class="row">
            <div class="search-container col-lg-6" style="display: none;">
                <h1>Recherchez votre<br>
                    station</h1>
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <input type="text"
                               class="form-control"
                               id="searchBar"
                               placeholder="Exemple : Bonne Nouvelle">
                    </div>
                </form>
            </div><!-- /col-lg-6 -->
            <div class="col-lg-6">
                <img class="img-responsive"
                     src="public/img/ipad-hand.png" alt="" style="display: none;">
            </div><!-- /col-lg-6 -->

        </div><!-- /row -->
    </div><!-- /container -->

</div><!-- /headerwrap -->

<div class="row" >
    <div class="col-md-3">
        <table class="table " style="color: white; text-align: center;">
            <tr>
                <td></td>
                <td><img class='station-number' src='public/img/M_1.png'/>
                </td>
            </tr>
            <tr>
                <td>
                    La Défense (Grande Arche)
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%" >
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    Porte de Vincennes
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%">
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-3">
        <table class="table col-md-3" style="color: white; text-align: center;">
            <tr>
                <td></td>
                <td><img class='station-number' src='public/img/M_1.png'/>
                </td>
            </tr>
            <tr>
                <td>
                    La Défense (Grande Arche)
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%" >
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    Porte de Vincennes
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%">
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-3">
        <table class="table col-md-3" style="color: white; text-align: center;">
            <tr>
                <td></td>
                <td><img class='station-number' src='public/img/M_1.png'/>
                </td>
            </tr>
            <tr>
                <td>
                    La Défense (Grande Arche)
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%" >
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    Porte de Vincennes
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%">
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-3">
        <table class="table col-md-3" style="color: white; text-align: center;">
            <tr>
                <td></td>
                <td><img class='station-number' src='public/img/M_1.png'/>
                </td>
            </tr>
            <tr>
                <td>
                    La Défense (Grande Arche)
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%" >
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    Porte de Vincennes
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%">
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-3">
        <table class="table col-md-3" style="color: white; text-align: center;">
            <tr>
                <td></td>
                <td><img class='station-number' src='public/img/M_1.png'/>
                </td>
            </tr>
            <tr>
                <td>
                    La Défense (Grande Arche)
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%" >
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    Porte de Vincennes
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="50%">
                                <b>2 min</b>
                            </td>
                            <td>
                                4 min
                            </td>
                            <td>
                                6 min
                            </td>
                            <td>
                                8 min
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Connectez-vous pour profiter de toutes les fonctionnalités !</h4>
            </div>
            <div class="modal-body">
                Les horaires à cette station vous intéressent ?<br><br> {{ link_to('login', 'Connectez-vous') }} ou {{ link_to('user/create', 'créez un compte') }} pour en profiter dès maintenant !
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Station declaration
        var stations = [{% for station in stations %}
            {
                value: "{{ station.name }}",
                lines: [{% for line in station.lines %}"{{ line }}"{% if (not loop.last) %},{% endif %}{% endfor %}]
            }
            {% if (not loop.last) %},{% endif %}
            {%  endfor %}];

        // Autocomplete initialization and overriding rendering template
        $("#searchBar").autocomplete({
            minLength: 0,
            source: function(request, response) {
                var results = $.ui.autocomplete.filter(stations, request.term);

                response(results.slice(0, 5));
            },
            focus: function(event, ui) {
                $("#searchBar").val(ui.item.label);
                return false;
            },
            select: function(event, ui) {
                $('#myModal').modal(true);
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            var lines_img = "";
            item.lines.forEach(function(entry) {
                lines_img += "<img class='station-number' src='public/img/M_" + entry + ".png'/>";
            });

            return $("<li>")
                    .append("<a class='autocomplete-suggestion autocomplete-selected'>" + lines_img + ' ' + item.value)
                    .appendTo(ul);
        };

        $('.search-container').fadeIn('slow', function() {
            $('img').fadeIn('slow');
        });
    });
</script>
</body>
</html>

