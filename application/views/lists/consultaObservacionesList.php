<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="text-right" style="margin:4px;">
<?php
echo Form::button( "volver", "Volver al Panel",
		array( 'onClick' => "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . "/Paneltemporal/'", 'class' => "btn"  ) );
?>
</div>
<br/>

<form action="<?php echo $visor->getUrlListado(); ?>" id="formulario" method="post" >
<table class='table table-condensed table-bordered'>
<tr>
	<td>Gremio Observacion</td>
	<td>
		<select name="idgremioobs" id="idgremioobs" class="form-control recargar" >
			<?php
				echo "<option value='0' >Elegir Gremio</option>";
				foreach( $gremioObservaciones as $gremioObservacion ) {
					$selected = "";
					if($idgremioobs != null && $idgremioobs == $gremioObservacion->idgremioobs ) {
						$selected = "selected=selected";
					}
					echo "<option value='" . $gremioObservacion->idgremioobs . "' $selected >".$gremioObservacion->nombre."</option>";
				}
			?>
		</select>
	</td>
</tr>
<tr>
	<td>Sector Oficial</td>
	<td>
		<select name="idsectoroficial" id="idsectoroficial" class="form-control recargar" >
			<?php
				echo "<option value='0' >Elegir Sector Oficial</option>";
				foreach( $sectoroficial as $sector ) {
					$selected = "";
					if($idsectoroficial != null && $idsectoroficial == $sector["idsector"] ) {
						$selected = "selected=selected";
					}
					echo "<option value='" . $sector["idsector"] . "' $selected >".$sector["nombre"]."</option>";
				}
			?>
		</select>
	</td>
</tr>
<tr>
	<td>Observacion Oficial</td>
	<td>
		<select name="idobservacionoficial" id="idobservacionoficial" class="form-control recargar" >
			<?php
				echo "<option value='0' >Elegir Observación</option>";
				foreach( $observacionoficial as $observacion ) {
					$selected = "";
					if($idobservacionoficial != null && $idobservacionoficial == $observacion["idobservacion"] ) {
						$selected = "selected=selected";
					}
					echo "<option value='" . $observacion["idobservacion"] . "' $selected >".$observacion["nombre"]."</option>";
				}
			?>
		</select>
	</td>
</tr>
<tr>
	<td>Descripcion Oficial</td>
	<td>
		<select name="iddescripcion" id="iddescripcion" class="form-control recargar" >
			<?php
				echo "<option value='0' >Elegir Descripción</option>";
				foreach( $descripcionoficial as $descripcion ) {
					$selected = "";
					if($iddescripcion != null && $iddescripcion == $descripcion["iddescripcion"] ) {
						$selected = "selected=selected";
					}
					echo "<option value='" . $descripcion["iddescripcion"] . "' $selected >".$descripcion["nombre"]."</option>";
				}
			?>
		</select>
	</td>
</tr>
<tr>
	<td>Detalle</td>
	<td>
		<select name="iddetalle" id="iddetalle" class="form-control" >
			<?php
				echo "<option value='0' >Elegir Detalle</option>";
				foreach( $detalle as $det ) {
					$selected = "";
					if($iddetalle != null && $iddetalle == $det["iddetalle"] ) {
						$selected = "selected=selected";
					}
					echo "<option value='" . $det["iddetalle"] . "' $selected >".$det["nombre"]."</option>";
				}
			?>
		</select>
	</td>
</tr>
</table>
</form>

<script>
$( document ).ready(function() {
	$( ".recargar" ).change(function() {
		$( "#formulario" ).submit();
	});
});
</script>