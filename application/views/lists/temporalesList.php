<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<?php
if( $visor->getObjeto() != null && sizeof( $visor->getObjeto()->getErrores() ) > 0 ) {
echo "<div id='error' class='alert alert-danger' >";
	echo "<ul>";
		foreach( $visor->getObjeto()->getErrores() as $error ) {
		echo "<li>$error</li>";
		}
		echo "</ul>";
	echo "</div>";
}
?>

<div class="well well-info" >
	<form action="<?php echo $visor->getUrlListado(); ?>" method="post" >
		<table>
			<colgroup>
				<col width="150px;" >
				<col>
			</colgroup>
			<tr>
				<td><label class="control-label">Titular</label></td>
				<td><input type="text" name="titularFiltro" class="form-control" value="<?php echo $titularFiltro;?>" ></td>
			</tr>
			<tr>
				<td><label class="control-label">Distrito</label></td>
				<td>
					<select name="distritoFiltro" class="form-control" >
						<?php
							echo "<option value='' >Elegir Distrito</option>";
							foreach( $distritos as $distrito ) {
								$selected = strcmp($distrito, $distritoFiltro) == 0 ? "selected=selected" : "";
								echo "<option value='" . $distrito->nombredistrito . "' $selected >" . $distrito->nombredistrito . "</option>";
							}
						?>
					</select>
				</td>
			</tr>
		</table>
		<?php echo Form::submit( "filtrar", "Filtrar", array('class' => "btn btn-warning" ))?>
	</form>
</div>

<div class="text-right" style="margin:4px;">
<?php
echo Form::button( "volver", "Volver al Panel",
		array( 'onClick' => "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . "/Paneltemporal/'", 'class' => "btn"  ) ); 
//echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'", 'class' => "btn btn-danger"  ) );
?>
</div>
<br/>
<?php 
echo "<table class='table table-condensed table-bordered table-hover'>";
echo "<thead>";
	echo "<tr class='bg-inverse'>";
		foreach( $visor->getNombreColumnas() as $key => $value ) {
			echo "<th>$value</th>";
		}
	echo "</tr>";
echo "</thead>";

	$urlObras = Kohana::$index_file . "/Obrastemporal/index/id=";
    $urlAdicionales = Kohana::$index_file . "/Adicionalestemporal/index/id=";
    $urlFactibilidad = Kohana::$index_file . "/Factibilidadtemporal/index/id=";
    $urlImpresionAforo = Kohana::$index_file . "/Imprimiraforotemporal/index/id=";
	$urlImprimir = Kohana::$index_file . "/Imprimirexpediente/index/id=";
	$nombreColumnaCargar = "Cargar";
	$nombreColumnaImprimir = "Imprimir Datos";
	foreach( $visor->getListado() as $key => $value ) {
		$id = $value->pk();
		//obras
		$cantidadObras = $value->getCantidadObras();
		$obrasBadge = "<span class='badge pull-right'>$cantidadObras</span>";
		$nombreColumnaObras = $cantidadObras == 0 ? "No hay Obras Solicitadas" : "Ver Obras Solicitadas $obrasBadge";
        //adicionales
        $cantidadAdicionales = $value->getCantidadAdicionales();
        $adicionalesBadge = "<span class='badge pull-right'>$cantidadAdicionales</span>";
        $nombreColumnaAdicionales = $cantidadAdicionales == 0 ? "No hay Adicionales" : "Ver Adicionales de Obra $adicionalesBadge";
		//factibilidad
		$cantidadFactibilidad = $value->getCantidadFactibilidad();
		$factibilidadBadge = "<span class='badge pull-right'>$cantidadFactibilidad</span>";
		$nombreColumnaFactibilidad = $cantidadFactibilidad == 0 ? "No hay Factibilidad" : "Ver Factibilidad $factibilidadBadge";
        //impresion de aforo
        $nombreColumnaImpresionAforo = "Imprimir Aforo";

		echo "<tbody>";
		echo "<tr>";
		echo "<td>$value->titular</td>";
		echo "<td>" . html::anchor( $urlObras . $id, $nombreColumnaObras ) . "</td>";
        echo "<td>" . html::anchor( $urlAdicionales . $id, $nombreColumnaAdicionales ) . "</td>";
        echo "<td>" . html::anchor( $urlFactibilidad . $id, $nombreColumnaFactibilidad ) . "</td>";
        echo "<td>" . html::anchor( $urlImpresionAforo . $id, $nombreColumnaImpresionAforo ) . "</td>";
		echo "<td>" . html::anchor( $urlImprimir . $id . "&tipo=1", $nombreColumnaImprimir ) . "</td>";
		echo "<td >" . $visor->getEditLink($id) . "</td>";
        echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
		
		echo "</tr>";
		echo "</tbody>";
	}
echo "</table>";
?>
