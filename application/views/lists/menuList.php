<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="well well-info" >
	<form action="<?php echo $visor->getUrlListado(); ?>" method="post" >
		<table>
			<colgroup>
				<col width="150px;" >
				<col>
			</colgroup>
			<tr>
				<td><label class="control-label">Tipo de Menu</label></td>
				<td>
					<select name="idTipoMenu" class="form-control" >
						<?php
							echo "<option value='0' >Todos</option>";
							foreach( $tiposMenu as $tipoMenuItem ) {
								echo "<option value='" . $tipoMenuItem->idtipomenu . "' >" . $tipoMenuItem->nombre . "</option>";
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
echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'", 'class' => "btn btn-danger"  ) );
?> 
</div>

<?php 
	//encabezado de la tabla.-
echo "<table class='table table-condensed table-bordered table-hover'>";

echo "<thead><tr class='bg-inverse'>";
	foreach( $visor->getNombreColumnas() as $key => $value )
	{
		echo "<th>$value</th>";
	}
	echo "</tr></thead>";

	//datos de la tabla.-
	foreach( $visor->getListado() as $key => $value )
	{
		$id = $value->idmenu;
		echo "<tr>";
		echo "<td>$value->codigo</td>";
		echo "<td>$value->nombre</td>";
		echo "<td>$value->url</td>";
		echo "<td>" . $value->tipoMenu->nombre . "</td>";
		echo "<td class='bool'>" . ($value->visible == 1 ? "Si" : "No") . "</td>";
		echo "<td>$value->urlimagen</td>";
		echo "<td>" . $value->padre->nombre . "</td>";
		echo "<td>" . $visor->getEditLink( $id ) . "</td>";
        echo "<td>" . $visor->getDeleteLink( $id, "Ocultar" ) . "</td>";
		echo "</tr>";
	}
echo "</table>";
?>

