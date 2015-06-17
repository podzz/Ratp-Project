<?php $logged = (isset($email)); ?>
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

    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900'
          rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/smoothness/jquery-ui.css" />
    <style type="text/css">
        *, *::before, *::after {
            box-sizing: unset;
        }

        .panel {
            margin-top: 100px;
        }
    </style>
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
            <?php if (!$logged) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><?php echo $this->tag->linkTo(array('login', 'Déjà membre ?')); ?></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><?php echo $this->tag->linkTo(array('user/create', 'Créer un compte')); ?></li>
                </ul>
            <?php } else { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><?php echo $this->tag->linkTo(array('login/disconnect', 'Déconnexion')); ?></li>
                </ul>
                <?php if (!$admin) { ?>
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                        <li><a id="getToken" href="#">Mon token</a></li>
                    </ul>
                <?php } ?>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 20px; margin-top: 3px;">
                    <li><h4><?php echo $email; ?></h4></li>
                </ul>
            <?php } ?>
        </div><!--/.nav-collapse -->
    </div>
</header>
<?php if ($logged) { ?>
<div id="headerwrap" style="margin: 20px auto auto;">
    <?php if (!$admin) { ?>
    <div style="width: inherit; height: inherit; margin: 0 auto; background: transparent;">

        <div id="container-speed" style="width: inherit; height: inherit; background: transparent;"></div>
    </div>
    <?php } ?>
<?php } else { ?>
<div id="headerwrap">
<?php } ?>

    <div class="container">
    <div class="row">
        <?php if ($admin) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Liste des utilisateurs et leur consommation</h2>
            </div>
            <div class="panel-body">
                <?php if ((!isset($users)) || (empty($users))) { ?>
                    <h4 style="color: #000000;">Pas d'utilisateur à afficher</h4>
                <?php } else { ?>
                <ul>
                    <?php foreach ($users as $user) { ?>
                        <li><?php echo $user->mail; ?>&nbsp;:&nbsp;<?php echo $user->conso; ?>/<?php echo $user->maxconso; ?></li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>


        <?php } else { ?>

        <?php if ($logged) { ?>
        <div class="search-container" style="margin-bottom: 30px; text-align: center;">
            <?php } else { ?>
            <div class="search-container col-lg-6" style="display: none;">
                <?php } ?>
                <h1>Recherchez votre station</h1>
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchBar" placeholder="Exemple : Bonne Nouvelle">
                    </div>
                </form>
            </div><!-- /col-lg-6 -->
            <?php if ($logged) { ?>
                <div id="searchResults">
                    <div class="col-md-5" style="background-color: #246593; margin-bottom: 20px;">
                        <table class="table" style="color: white; text-align: center;">
                            <tr>
                                <td><img class='station-number' src='img/M_1.png'/>
                                </td>
                            </tr>
                            <tr>
                                <table class="table" style="color: white; text-align: center;">
                                    <tr>
                                        <td><b>1min</b></td><td>3min</td><td>5min</td><td>8min</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>

                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                    </tr>
                                </table>
                            </tr>
                            <tr>
                                <table class="table" style="color: white; text-align: center;">
                                    <tr>
                                        <td><b>1min</b></td><td>3min</td><td>5min</td><td>8min</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>

                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                    </tr>
                                </table>
                            </tr>
                        </table>
                    </div><!-- /col-lg-6 -->
                    <div class="col-md-5 col-md-offset-1" style="background-color: #246593; margin-bottom: 20px;">
                        <table class="table" style="color: white; text-align: center;">
                            <tr>
                                <td><img class='station-number' src='img/M_1.png'/>
                                </td>
                            </tr>
                            <tr>
                                <table class="table" style="color: white; text-align: center;">
                                    <tr>
                                        <td><b>1min</b></td><td>3min</td><td>5min</td><td>8min</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>

                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                    </tr>
                                </table>
                            </tr>
                            <tr>
                                <table class="table" style="color: white; text-align: center;">
                                    <tr>
                                        <td><b>1min</b></td><td>3min</td><td>5min</td><td>8min</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>

                                        </td>
                                        <td>
                                            <h6>La Défense (Grande Arche)</h6>
                                        </td>
                                    </tr>
                                </table>
                            </tr>
                        </table>
                    </div><!-- /col-lg-6 -->
                </div>

            <?php } else { ?>
                <div class="col-md-5">
                    <img class="img-responsive" src="img/ipad-hand.png" alt="" style="display: none;">
                </div><!-- /col-lg-6 -->
            <?php } ?>


        <?php } ?>

        </div><!-- /row -->
    </div><!-- /container -->
        </div><!-- /headerwrap -->


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Connectez-vous pour profiter de toutes les fonctionnalités !</h4>
                    </div>
                    <div class="modal-body">
                        Les horaires à cette station vous intéressent ?<br><br> <?php echo $this->tag->linkTo(array('login', 'Connectez-vous')); ?> ou <?php echo $this->tag->linkTo(array('user/create', 'créez un compte')); ?> pour en profiter dès maintenant !
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <?php if (isset($token)) { ?>
    <div class="modal fade" id="tokenModal" tabindex="-1" role="dialog" aria-labelledby="tokenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Votre token</h4>
                </div>
                <div class="modal-body">
                    <p>Vous disposez d'un token unique pour utiliser notre API. Vous pouvez vous en servir de manière illimitée
                    tant que vous ne dépassez pas la limite fixée par votre souscription.</p>
                    <p>Votre token est :<br><b><?php echo $token; ?></b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php } ?>
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/highcharts-more.js"></script>
        <script src="http://code.highcharts.com/modules/solid-gauge.js"></script>
    <?php if (!$admin) { ?>
        <script type="text/javascript">
            $(document).ready(function() {

                // Station declaration
                var stations = [<?php $v37310255246903341671iterator = $stations; $v37310255246903341671incr = 0; $v37310255246903341671loop = new stdClass(); $v37310255246903341671loop->length = count($v37310255246903341671iterator); $v37310255246903341671loop->index = 1; $v37310255246903341671loop->index0 = 1; $v37310255246903341671loop->revindex = $v37310255246903341671loop->length; $v37310255246903341671loop->revindex0 = $v37310255246903341671loop->length - 1; ?><?php foreach ($v37310255246903341671iterator as $station) { ?><?php $v37310255246903341671loop->first = ($v37310255246903341671incr == 0); $v37310255246903341671loop->index = $v37310255246903341671incr + 1; $v37310255246903341671loop->index0 = $v37310255246903341671incr; $v37310255246903341671loop->revindex = $v37310255246903341671loop->length - $v37310255246903341671incr; $v37310255246903341671loop->revindex0 = $v37310255246903341671loop->length - ($v37310255246903341671incr + 1); $v37310255246903341671loop->last = ($v37310255246903341671incr == ($v37310255246903341671loop->length - 1)); ?>
                    {
                        value: "<?php echo $station->name; ?>",
                        lines: [<?php $v37310255246903341672iterator = $station->lines; $v37310255246903341672incr = 0; $v37310255246903341672loop = new stdClass(); $v37310255246903341672loop->length = count($v37310255246903341672iterator); $v37310255246903341672loop->index = 1; $v37310255246903341672loop->index0 = 1; $v37310255246903341672loop->revindex = $v37310255246903341672loop->length; $v37310255246903341672loop->revindex0 = $v37310255246903341672loop->length - 1; ?><?php foreach ($v37310255246903341672iterator as $line) { ?><?php $v37310255246903341672loop->first = ($v37310255246903341672incr == 0); $v37310255246903341672loop->index = $v37310255246903341672incr + 1; $v37310255246903341672loop->index0 = $v37310255246903341672incr; $v37310255246903341672loop->revindex = $v37310255246903341672loop->length - $v37310255246903341672incr; $v37310255246903341672loop->revindex0 = $v37310255246903341672loop->length - ($v37310255246903341672incr + 1); $v37310255246903341672loop->last = ($v37310255246903341672incr == ($v37310255246903341672loop->length - 1)); ?>"<?php echo $line; ?>"<?php if ((!$v37310255246903341672loop->last)) { ?>,<?php } ?><?php $v37310255246903341672incr++; } ?>]
                    }
                    <?php if ((!$v37310255246903341671loop->last)) { ?>,<?php } ?>
                    <?php $v37310255246903341671incr++; } ?>];

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
                        <?php if ($logged) { ?>
                        var linesData = '[';
                        linesData += ui.item.lines[0];

                        for (i = 1; i < ui.item.lines.length; ++i) {
                            linesData += ', ' + ui.item.lines[i];
                        }

                        linesData += ']';

                        var requestData = '{ "linesNumber":"' + linesData + '",  "station_name":"' + ui.item.label + '" }';
                        /* var data_tmp = '{\
                         "serviceStatus": "Up",\
                         "stationName": "Châtelet",\
                         "requestLines": [\
                         1,\
                         4,\
                         7,\
                         14\
                         ],\
                         "lines": {\
                         "1": [\
                         { \
                         "Aller": { \
                         "next_metro": [\
                         "2 mn",\
                         "6 mn",\
                         "12 mn",\
                         "16 mn"\
                         ],\
                         "destination": "La Défense"\
                         },\
                         "Retour": {\
                         "next_metro": [\
                         "1 mn",\
                         "6 mn",\
                         "11 mn",\
                         "16 mn"\
                         ],\
                         "destination": "Château de Vincennes"\
                         }\
                         }\
                         ],\
                         "4": [\
                         {\
                         "Aller": {\
                         "next_metro": [\
                         "0 mn",\
                         "9 mn",\
                         "16 mn",\
                         "22 mn"\
                         ],\
                         "destination": "Mairie de Montrouge"\
                         },\
                         "Retour": {\
                         "next_metro": [\
                         "Train a l\'approche",\
                         "5 mn",\
                         "12 mn",\
                         "19 mn"\
                         ],\
                         "destination": "Porte de Clignancourt"\
                         }\
                         }\
                         ],\
                         "7": [\
                         {\
                         "Aller": {\
                         "next_metro": [\
                         "3 mn",\
                         "12 mn",\
                         "17 mn",\
                         "23 mn"\
                         ],\
                         "destination": "Mairie d\'Ivry"\
                         },\
                         "Retour": {\
                         "next_metro": [\
                         "0 mn",\
                         "8 mn",\
                         "15 mn",\
                         "21 mn"\
                         ],\
                         "destination": "La Courneuve 8 mai 1945"\
                         }\
                         }\
                         ],\
                         "14": [\
                         {\
                         "Aller": {\
                         "next_metro": [\
                         "1 mn",\
                         "4 mn",\
                         "7 mn"\
                         ],\
                         "destination": "Saint-Lazare"\
                         },\
                         "Retour": {\
                         "next_metro": [\
                         "0 mn",\
                         "3 mn",\
                         "6 mn"\
                         ],\
                         "destination": "Olympiades"\
                         }\
                         }\
                         ]\
                         }\
                         }';
                         $('#lineResult').html(addLineInfo(JSON.parse(data_tmp)));
                         */
                        $.ajax({
                            type: "POST",
                            url: "api/nextMetro",
                            data: requestData,
                            success: function(data) {
                                $('#lineResult').html(addLineInfo(data));
                            }
                        });

                        <?php } else { ?>
                        $('#myModal').modal(true);
                        <?php } ?>
                        return false;
                    }
                }).data("ui-autocomplete")._renderItem = function(ul, item) {
                    var lines_img = "";
                    item.lines.forEach(function(entry) {
                        lines_img += "<img class='station-number' src='img/M_" + entry + ".png'/>";
                    });

                    return $("<li>")
                            .append("<a class='autocomplete-suggestion autocomplete-selected'>" + lines_img + ' ' + item.value)
                            .appendTo(ul);
                };

                $('.search-container').fadeIn('slow', function() {
                    $('img').fadeIn('slow');
                });

                <?php if (isset($token)) { ?>
                var gaugeOptions = {

                    chart: {
                        type: 'solidgauge'
                    },

                    title: null,

                    pane: {
                        center: ['50%', '85%'],
                        size: '140%',
                        startAngle: -90,
                        endAngle: 90,
                        background: {
                            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                            innerRadius: '60%',
                            outerRadius: '100%',
                            shape: 'arc'
                        }
                    },

                    tooltip: {
                        enabled: false
                    },

                    // the value axis
                    yAxis: {
                        stops: [
                            [0.1, '#DF5353'], // red
                            [0.5, '#DDDF0D'], // yellow
                            [0.9, '#55BF3B'] // green
                        ],
                        lineWidth: 0,
                        minorTickInterval: null,
                        tickPixelInterval: 400,
                        tickWidth: 0,
                        title: {
                            y: -70
                        },
                        labels: {
                            y: 16
                        }
                    },

                    plotOptions: {
                        solidgauge: {
                            dataLabels: {
                                y: 5,
                                borderWidth: 0,
                                useHTML: true
                            }
                        }
                    }
                };

                $('#container-speed').highcharts(Highcharts.merge(gaugeOptions, {
                    yAxis: {
                        min: 0,
                        max: <?php echo $quota; ?>,
                        title: {
                            text: ''
                        }
                    },

                    credits: {
                        enabled: false
                    },

                    series: [{
                        name: 'Quota',
                        data: [<?php echo $quota - $actualConso; ?>],
                        dataLabels: {
                            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                            'white' + '">{y}</span><br/>' +
                            '<span style="font-size:12px;color:silver">requête(s) restantes(s)</span></div>'
                        },
                        tooltip: {
                            valueSuffix: ' / <?php echo $quota; ?>'
                        }
                    }]

                }));
                $('.highcharts-background').attr('fill', '#246593');
                $('text').css('color', '#FFFFFF').css('fill', '#FFFFFF');
                $('#getToken').bind('click', function() {
                    $('#tokenModal').modal(true);
                });
                <?php } ?>
            });


            function addLineInfo(lineInfo) {
                var table = $('<table>').addClass("table").css("color", "white").css("text-align", "center");
                debugger;

                lineInfo.requestLines.forEach(function (line) {
                    var lineImg = $('<img src=\'img/M_' + line + '.png\'>').addClass('station-number');
                    var lineIdentity = $('<tr>')
                            .append('<td>')
                            .append($('<td>').append(lineImg));

                    $(table)
                            .append(lineIdentity);


                    $(table)
                            .append($('<tr>')
                                    .append());

                });
                return table;

            }

        </script>
    <?php } ?>
</body>
</html>

