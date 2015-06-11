<!DOCTYPE html>
<html lang="fr">
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
            <a class="navbar-brand"
               href="#"><b>Reste Assis T'es
                    Posé</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Déjà membre ?</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Mot de passe
                        oublié</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</header>

<div id="headerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
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
                     src="public/img/ipad-hand.png" alt="">
            </div><!-- /col-lg-6 -->

        </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /headerwrap -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster
-->
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Station declaration
        var stations = [<?php $v37310255246903341671iterator = $stations; $v37310255246903341671incr = 0; $v37310255246903341671loop = new stdClass(); $v37310255246903341671loop->length = count($v37310255246903341671iterator); $v37310255246903341671loop->index = 1; $v37310255246903341671loop->index0 = 1; $v37310255246903341671loop->revindex = $v37310255246903341671loop->length; $v37310255246903341671loop->revindex0 = $v37310255246903341671loop->length - 1; ?><?php foreach ($v37310255246903341671iterator as $station) { ?><?php $v37310255246903341671loop->first = ($v37310255246903341671incr == 0); $v37310255246903341671loop->index = $v37310255246903341671incr + 1; $v37310255246903341671loop->index0 = $v37310255246903341671incr; $v37310255246903341671loop->revindex = $v37310255246903341671loop->length - $v37310255246903341671incr; $v37310255246903341671loop->revindex0 = $v37310255246903341671loop->length - ($v37310255246903341671incr + 1); $v37310255246903341671loop->last = ($v37310255246903341671incr == ($v37310255246903341671loop->length - 1)); ?>
            {
                value: '<?php echo $station->name; ?>',
                lines: [<?php $v37310255246903341672iterator = $station->lines; $v37310255246903341672incr = 0; $v37310255246903341672loop = new stdClass(); $v37310255246903341672loop->length = count($v37310255246903341672iterator); $v37310255246903341672loop->index = 1; $v37310255246903341672loop->index0 = 1; $v37310255246903341672loop->revindex = $v37310255246903341672loop->length; $v37310255246903341672loop->revindex0 = $v37310255246903341672loop->length - 1; ?><?php foreach ($v37310255246903341672iterator as $line) { ?><?php $v37310255246903341672loop->first = ($v37310255246903341672incr == 0); $v37310255246903341672loop->index = $v37310255246903341672incr + 1; $v37310255246903341672loop->index0 = $v37310255246903341672incr; $v37310255246903341672loop->revindex = $v37310255246903341672loop->length - $v37310255246903341672incr; $v37310255246903341672loop->revindex0 = $v37310255246903341672loop->length - ($v37310255246903341672incr + 1); $v37310255246903341672loop->last = ($v37310255246903341672incr == ($v37310255246903341672loop->length - 1)); ?><?php echo $line; ?><?php if ((!$v37310255246903341672loop->last)) { ?>,<?php } ?><?php $v37310255246903341672incr++; } ?>]
            }
            <?php if ((!$v37310255246903341671loop->last)) { ?>,<?php } ?>
            <?php $v37310255246903341671incr++; } ?>];

        // Autocomplete initialization and overriding rendering template
        $("#searchBar").autocomplete({
            minLength: 0,
            source: stations,
            focus: function(event, ui) {
                $("#searchBar").val(ui.item.label);
                return false;
            },
            select: function(event, ui) {
                /* Todo : Call the API and display results */
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            var lines_img = "";
            item.lines.forEach(function(entry) {
                lines_img += "<img class='station-number' src='public/img/m" + entry + ".png'/>";
            });

            return $("<li>")
                    .append("<a class='autocomplete-suggestion autocomplete-selected'>" + lines_img + item.value)
                    .appendTo(ul);
        };


    });
</script>
</body>
</html>

