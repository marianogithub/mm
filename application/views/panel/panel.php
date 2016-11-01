<?php require_once 'application/config/server.php'; ?>

<?php 
$url = Server::$dominio . "/" . Server::$indexFile . "/";
echo "<div class='row'>";
for( $i=0 ; $i<sizeof($opciones) ; $i++ ) {
	$opcion = $opciones[$i];
	echo "<div class='col-xs-4 col-xs-offset-2'>";
	echo "<a href='$url" . $opcion->url."' class='btn btn-info btn-lg' style='width:300px; heigth:100px'>";
	$imagen = $opcion->urlimagen != null && (strcmp("", trim($opcion->urlimagen)) != 0) ? $opcion->urlimagen : "glyphicon-cog";
	echo "	<span class='glyphicon $imagen'></span>&nbsp;".$opcion->nombre;
	echo "</a>"; 
	echo "</div>";
	if(($i+1)%2 == 0) {
		echo "<br/><hr/>";
	}
}
echo "</div><br/>";
?>