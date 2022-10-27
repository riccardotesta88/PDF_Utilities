<?php

class UtilsTool {

	protected $t_header_year = '
	<div id=\"%s\" class=\"text-center\"><h2>Edizione %s</h2>;
	<small><span><a href=\"#toplist\"><i class=\"icofont-arrow-up\"></i></a></span></small><hr></h2></div>';

	function getFiles( $path ) {
		$html = "";

		//Get a list of file paths using the glob function to get all files in folder.
		$fileList   = glob( $path . '/*' );
		$foldername = explode( "/", $path )[2];
		$elemn      = 0;

		//Navigation menu
		$html .= printf( $this->t_header_year, $foldername, str_replace( '_', ' ', $foldername ) );
		echo $html;

		//Loop through the array that glob returned.
		$i    = 0;
		$elem = 0;
		sort( $fileList, SORT_NATURAL );
		echo '<div class="row">';
		foreach ( $fileList as $filename ) {

			//numero oggetti
			$name = explode( "/", $filename )[2];

			//Creazione colonne in numero indicato da $elLinea
			$filename1 = str_replace( "/orig/", "/thumb/", $filename );
			$percorso  = $filename;

			echo '<div class="col-md-3 item">';

			$didas = str_replace( '.jpg', '', explode( '/', $filename )[3] );
			$didas = preg_replace( "/\(\d{1,4}\)/", "", $didas );
			$didas = str_replace( '427x640', '', $didas );
			$didas = str_replace( '640x427', '', $didas );

			if ( strlen( $didas ) < 10 ) {
				$minh = "auto";
			} else {
				$minh = "300px";
			}

			echo '<div class="card flex" style="min-height:' . $minh . '"><a href="' . $filename . '" target="_blank">';

			echo '<img src="' . htmlentities( $filename1 ) . '" style="min-height:200px" alt="Immagine edizione" onmouseover="show(\'#' . $i . '\')" />';
			echo '</a>';


			if ( strlen( $didas ) < 10 ) {
				$didas = '';
			}

			echo '<span class=" py-3 px-1 text-wrap word-wrap text-center" id="' . $i . '" style="font-size:0.7rem">' . $didas . '</span>';


			echo '</div>
   
        </div>';

			$elem = $elem + 1;
			$i    = $i + 1;
			if ( $elem % 4 == 0 ) {
				echo '</div><div class="row">';
			}
		}
		echo "</div>";

	}
}


function getEdizioni( $dirs ) {
	$code = "";

	echo "<div class='text-center text-uppercase'><h1 id='toplist'>Edizioni</h1>";
	foreach ( $dirs as $el ) {
		$foldername = explode( "/", $el )[2];
		$elemn      = 0;
		$code       = $code . '<a href="#' . $foldername . '"><button type="button" class="btn btn-primary">' . str_replace( '_', ' ', $foldername ) . "</button></a>  ";
	}
	echo $code;
	echo '</div>';
}

function getList( $dirs ) {
	foreach ( $dirs as $el ) {
		$foldername = explode( "/", $el )[2];
		$elemn      = 0;

		echo '<div class="grid effect-2" id="grid">';
		getFiles( $el );
		echo '</div>';
	}
}

$dirs = array_filter( glob( 'imgs/orig/*' ), 'is_dir' );

//Creazione della prima riga associata all'anno della cartella immagini da leggere

$dirs = array_reverse( $dirs );
$code = "";
$code = getEdizioni( $dirs );

echo "<div class='' style='text-align:center'>";
echo $code . "<hr>";
echo "</div>";

getList( $dirs );

