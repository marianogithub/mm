
<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="text-right" style="margin:4px;">
<?php
echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'", 'class' => "btn btn-danger"  ) );
?>
</div>

<?php 
	//encabezado de la tabla.-
echo "<table  class='table table-condensed table-bordered table-hover'>";
echo "<thead><tr class='bg-inverse'>";
	foreach( $visor->getNombreColumnas() as $key => $value )
	{
		echo "<th>$value</th>";
	}
	echo "</tr></thead>";

	//datos de la tabla.-
	foreach( $visor->getListado() as $key => $value )
	{
		echo "<tr>";
		echo "<td>$value->nombre</td>";
		echo "<td>$value->valor</td>";
		echo "<td>$value->descripcion</td>";
		echo "<td class='linkEdit'>" . $visor->getEditLink( $value->idparametro ) . "</td>";
		echo "<td class='linkEliminar'>" . $visor->getDeleteLink( $value->idparametro ) . "</td>";
		echo "</tr>";
	}
echo "</table>";
?>
