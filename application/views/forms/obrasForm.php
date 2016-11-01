<?php require_once 'application/classes/util/dateUtil.php'; ?>

<?php
function dibujarCombo( $label, $name, $listado, $valorActual, $campoId, $campoValor) {
	echo "<tr>";
	echo "<td><label class='control-label' >$label</label></td>";
	echo "<td colspan='2' >";
	echo "<select name='$name' class='form-control' >";
	foreach( $listado as $item ) {
		$selected = "";
        $itemId = "" . $item->$campoId . "";
        $itemValor = $item->$campoValor;

		if( $valorActual != null && (strcmp($valorActual, $itemId) == 0) ) {
			$selected = "selected=selected";
		}
		echo "<option value='$itemId' $selected >$itemValor</option>";
	}
	echo "</select>";
	echo "</td>";
	echo "</tr>";
}
?>

<div class="p10">
<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >
<fieldset id="formulario">
<?php
echo Form::hidden( "id", $visor->getObjeto()->pk());
echo Form::hidden( "expediente", $visor->getObjeto()->expediente);

if( sizeof( $visor->getObjeto()->getErrores() ) > 0 ) {
	echo "<div id='error'>"; 
	echo "<ul>";
	foreach( $visor->getObjeto()->getErrores() as $error ) {
		echo "<li>$error</li>";
	}
	echo "</ul>";
	echo "</div>";
}
$aforos = $visor->getObjeto()->obtenerAforos();
?>
	<legend><?php echo $visor->getEncabezado(); ?></legend>
	<table>
		<colgroup>
			<col width="150px">
			<col >
            <col >
		</colgroup>
		<?php dibujarCombo("Nivel", "nivel", $niveles, $visor->getObjeto()->nivel, "idnivel", "nivel");?>
		<tr>
			<td><label class="control-label">Sup. Cubierta</label></td>
			<td>
				<?php echo Form::input( "sup", $visor->getObjeto()->sup, array('class' => "form-control" ))?>
			</td>

		</tr>
		<tr>
			<td><label class="control-label">Sup. Aleros</label></td>
			<td colspan="2" >
				<?php echo Form::input( "supaleros", $visor->getObjeto()->supaleros, array('class' => "form-control" ))?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Bocas Eléctricas</label></td>
			<td>
				<?php echo Form::input( "bocas", $visor->getObjeto()->bocas, array('class' => "form-control" ))?>
			</td>

		</tr>
		<tr>
			<td><label class="control-label">Potencia (Kw)</label></td>
			<td colspan="2" >
				<?php echo Form::input( "potencia", $visor->getObjeto()->potencia, array('class' => "form-control" ))?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Recintos Sanitarios</label></td>
			<td>
				<?php echo Form::input( "recintos", $visor->getObjeto()->recintos, array('class' => "form-control" ))?>
			</td>

		</tr>
		<?php dibujarCombo("Tipo Obra", "tipoobra", $tiposobra, $visor->getObjeto()->tipoobra, "nombreobra", "nombreobra");?>
		<?php dibujarCombo("Destino", "iddestino", $destinos, $visor->getObjeto()->iddestino, "iddestino", "nombredestino");?>
		<?php dibujarCombo("Trabajo Profesional", "idtrabajo", $trabajos, $visor->getObjeto()->idtrabajo, "idtrabajo", "nombretrabajo");?>
		<tr>
			<td><label class="control-label">Puntaje</label></td>
			<td colspan="2" >
				<?php echo Form::input( "puntaje", $visor->getObjeto()->puntaje, array('class' => "form-control" ))?>
			</td>
		</tr>
		<?php
			if($isAdmin) {
				echo "<tr>";
				echo "<td><label class='control-label'>Estado</label></td>";
				echo "<td colspan='2' >";
				echo Form::input( "estadoobra", $visor->getObjeto()->estadoobra, array('class' => "form-control" ));
				echo "</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td><label class='control-label'>Nº Recibo Pago</label></td>";
				echo "<td colspan='2' >";
				echo Form::input( "nrorecibo", $visor->getObjeto()->nrorecibo, array('class' => "form-control" ));
				echo "</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td><label class='control-label'>Fecha Pago</label></td>";
				echo "<td colspan='2' >";
				echo "<input type='text' readonly='readonly' name='fechapago' class='form-control'
						value='" . $visor->getObjeto()->getFechaPagoStr() . "' id='datepicker' >";
				echo "</td>";
				echo "</tr>";
			}
		?>
	</table>
</fieldset>

<div class="panel-footer well well-sm">
	<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
	<?php echo Form::button( "Cancelar", "Cancelar",
			array(	'type' => 'button',
					'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "/id=".$visor->getObjeto()->expediente."'" ,
					'class' => "btn") )?>
</div>
</form>
</div>

<script>
<?php
if($isAdmin) {
	echo "var dpC = $( '#datepicker' );";
	echo "var dateFormat = '" . DateUtil::getFormatoDatePicker() . "';";
	echo "var formatos = {dateFormat: dateFormat };";
	echo "$(function() {";
	echo "dpC.datepicker(formatos);";
	echo "dpC.datepicker( 'option', $.datepicker.regional['es'] );";
	echo "});";
}
?>
</script>