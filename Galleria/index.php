<!DOCTYPE html>
<html lang='en' class=''>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700&subset=latin,cyrillic-ext'
          rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js'></script>
    <link rel='stylesheet' href='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">


    <style class="cp-pen-styles">
        *, *:after, *:before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            padding: 0;
            margin: 0;
        }

        .clearfix:before, .clearfix:after {
            content: " ";
            display: table;
        }

        .clearfix:after {
            clear: both;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            color: #6b7381;
            background: #f2f2f2;
        }

        a {
            color: #aaa;
            text-decoration: none;
        }

        a:hover, a:active {
            color: #333;
        }

        h2 {
            color: #4E88AE;
            font-weight: 400;
            text-align: center;
        }

        img {
            border: 0;
            display: block;
            width: 100%;
        }

        .entry {
            background: #FFF;
            border: 1px solid rgba(0, 0, 0, .15);
            box-shadow: -10px 10px 10px -10px rgba(0, 0, 0, .35), -10px 10px 0 -3px rgba(0, 0, 0, .2);
            margin: 10px auto 20px;
            max-width: 800px;
            overflow: hidden;
            padding: 20px 40px;
            position: relative;
            text-align: center;
        }

        .entry > p {
            padding: 20px 0 10px;
        }

        .entry > .grid {
            margin: 20px auto 0px;
        }

        .entry > .grid > .item {
            width: 50%;
        }

        .grid {
            max-width: 88rem;
            list-style: none;
            margin: 30px auto;
            padding: 1px;
        }

        .grid .item {
            display: block;
            float: left;
            padding: 2px;
            width: 33%;
            opacity: 1;
        }

        .grid .item a, .grid .item img {
            outline: none;
            border: none;
            display: block;
            max-width: 100%;
        }

        .grid.effect-2 .item.animate {
            -webkit-transform: translateY(200px);
            transform: translateY(200px);
            -webkit-animation: moveUp 0.65s ease forwards;
            animation: moveUp 0.65s ease forwards;
        }

        @-webkit-keyframes moveUp {
            0% {
            }
            100% {
                -webkit-transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes moveUp {
            0% {
            }
            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1;
            }
        }

        @media screen and (max-width: 900px) {
            .grid .item {
                width: 50%;
            }

            .entry {
                box-shadow: none;
            }

            .entry > .grid > .item {
                width: 50%;
            }
        }

        @media screen and (max-width: 400px) {
            .grid .item {
                width: 100%;
            }

            .entry {
                padding: 20px 0;
            }

            .entry > p {
                padding: 10px;
            }

            .entry > .grid > .item {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<img src="logo_grey.png" width="70%!important">
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Acquistoria Galleria Fotografica Edizioni</h1>
        <p class="lead">Nella presente pagina troverete una selezione di immagini delle cerimonie di premiazione
            suddivise per anno. Cliccando sull'immagine si apre la versione in alta definizione.
        <div class="alert alert-warning" role="alert">
            Il caricamento della pagina potrebbe richiedere alcuni istanti.
        </div>
        </p>
    </div>
</div>


<?php
function getFiles($path)
{
    //Get a list of file paths using the glob function.
    $fileList = glob($path . '/*');
    $foldername = explode("/", $path)[2];
    $elemn = 0;


    echo '<div id="' . $foldername . '" class="text-center"><h2>Edizione ' . str_replace('_', ' ', $foldername) . " ";
    echo '<small><span><a href="#toplist"><i class="icofont-arrow-up"></i></a></span></small><hr></h2></div>';

    //Loop through the array that glob returned.
    $i = 0;
    $elem = 0;
    sort($fileList, SORT_NATURAL);
    echo '<div class="row">';
    foreach ($fileList as $filename) {

        //numero oggetti
        $name = explode("/", $filename)[2];

        //Creazione colonne in numero indicato da $elLinea
        $filename1 = str_replace("/orig/", "/thumb/", $filename);
        $percorso = $filename;

        echo '<div class="col-md-3 item">';

        $didas = str_replace('.jpg', '', explode('/', $filename)[3]);
        $didas = preg_replace("/\(\d{1,4}\)/", "", $didas);
        $didas = str_replace('427x640', '', $didas);
        $didas = str_replace('640x427', '', $didas);

        if (strlen($didas) < 10) {
            $minh = "auto";
        } else {
            $minh = "300px";
        }

        echo '<div class="card flex" style="min-height:' . $minh . '"><a href="' . $filename . '" target="_blank">';

        echo '<img src="' . htmlentities($filename1) . '" style="min-height:200px" alt="Immagine edizione" onmouseover="show(\'#' . $i . '\')" />';
        echo '</a>';


        if (strlen($didas) < 10) {
            $didas = '';
        }

        echo '<span class=" py-3 px-1 text-wrap word-wrap text-center" id="' . $i . '" style="font-size:0.7rem">' . $didas . '</span>';


        echo '</div>
   
        </div>';

        $elem = $elem + 1;
        $i = $i + 1;
        if ($elem % 4 == 0) {
            echo '</div><div class="row">';
        }
    }
    echo "</div>";

}

function getEdizioni($dirs){
    $code="";

    echo "<div class='text-center text-uppercase'><h1 id='toplist'>Edizioni</h1>";
    foreach ($dirs as $el) {
        $foldername = explode("/", $el)[2];
        $elemn = 0;
        $code = $code . '<a href="#' . $foldername . '"><button type="button" class="btn btn-primary">' . str_replace('_', ' ', $foldername) . "</button></a>  ";
    }
    echo $code;
    echo '</div>';
}

function getList($dirs){
    foreach ($dirs as $el) {
        $foldername = explode("/", $el)[2];
        $elemn = 0;

        echo '<div class="grid effect-2" id="grid">';
        getFiles($el);
        echo '</div>';
    }
}

$dirs = array_filter(glob('imgs/orig/*'), 'is_dir');

//Creazione della prima riga associata all'anno della cartella immagini da leggere

$dirs = array_reverse($dirs);
$code = "";
$code=getEdizioni($dirs);

echo "<div class='' style='text-align:center'>";
echo $code . "<hr>";
echo "</div>";

getList($dirs);

?>


<script src='//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/masonry/3.2.2/masonry.pkgd.min.js'></script>
<script>
    // $('#grid2 img').each(function () {
    //     var $this = $(this);
    //     $this.wrap('<div class="item"><a></a></div>');
    //     $('a').removeAttr('href');
    // });
    // $('#grid2').addClass('effect-2');
    //
    // $(window).load(function () {
    //     var $container = $('.grid');
    //     // initialize
    //     $container.masonry({
    //         //columnWidth: 200,
    //         itemSelector: '.item'
    //     });
    //
    //     $('.item > a').removeAttr('href');
    // });
    //
    // //# sourceURL=pen.js
    //
    function show($id) {
        $($id).show()
    }
</script>
</body>
</html>