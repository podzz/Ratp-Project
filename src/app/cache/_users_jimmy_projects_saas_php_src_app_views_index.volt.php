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
        var stations = [<?php $v143383495275208508961iterator = $stations; $v143383495275208508961incr = 0; $v143383495275208508961loop = new stdClass(); $v143383495275208508961loop->length = count($v143383495275208508961iterator); $v143383495275208508961loop->index = 1; $v143383495275208508961loop->index0 = 1; $v143383495275208508961loop->revindex = $v143383495275208508961loop->length; $v143383495275208508961loop->revindex0 = $v143383495275208508961loop->length - 1; ?><?php foreach ($v143383495275208508961iterator as $station) { ?><?php $v143383495275208508961loop->first = ($v143383495275208508961incr == 0); $v143383495275208508961loop->index = $v143383495275208508961incr + 1; $v143383495275208508961loop->index0 = $v143383495275208508961incr; $v143383495275208508961loop->revindex = $v143383495275208508961loop->length - $v143383495275208508961incr; $v143383495275208508961loop->revindex0 = $v143383495275208508961loop->length - ($v143383495275208508961incr + 1); $v143383495275208508961loop->last = ($v143383495275208508961incr == ($v143383495275208508961loop->length - 1)); ?>
            {
                value: '<?php echo $station->name; ?>',
                lines: [<?php $v143383495275208508962iterator = $station->lines; $v143383495275208508962incr = 0; $v143383495275208508962loop = new stdClass(); $v143383495275208508962loop->length = count($v143383495275208508962iterator); $v143383495275208508962loop->index = 1; $v143383495275208508962loop->index0 = 1; $v143383495275208508962loop->revindex = $v143383495275208508962loop->length; $v143383495275208508962loop->revindex0 = $v143383495275208508962loop->length - 1; ?><?php foreach ($v143383495275208508962iterator as $line) { ?><?php $v143383495275208508962loop->first = ($v143383495275208508962incr == 0); $v143383495275208508962loop->index = $v143383495275208508962incr + 1; $v143383495275208508962loop->index0 = $v143383495275208508962incr; $v143383495275208508962loop->revindex = $v143383495275208508962loop->length - $v143383495275208508962incr; $v143383495275208508962loop->revindex0 = $v143383495275208508962loop->length - ($v143383495275208508962incr + 1); $v143383495275208508962loop->last = ($v143383495275208508962incr == ($v143383495275208508962loop->length - 1)); ?><?php echo $line; ?><?php if ((!$v143383495275208508962loop->last)) { ?>,<?php } ?><?php $v143383495275208508962incr++; } ?>]
            }
            <?php if ((!$v143383495275208508961loop->last)) { ?>,<?php } ?>
            <?php $v143383495275208508961incr++; } ?>];

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

