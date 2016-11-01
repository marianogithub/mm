<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<?php 
echo "<div class='text-right' style='margin:4px;'>";
echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'", 'class' => "btn btn-danger"  ) );		
echo "</div>";	
//encabezado de la tabla.-
echo "<table class='table table-condensed table-bordered table-hover'>";
echo "<thead>";
echo "<tr class='bg-inverse'>";
	foreach( $visor->getNombreColumnas() as $key => $value )
	{
		echo "<th>$value</th>";
	}
	echo "</tr>";
	echo "</thead>";
	//datos de la tabla.-
	foreach( $visor->getListado() as $key => $value )
	{
		$id = $value->pk();
		echo "<tr>";
		echo "<td>$value->nombre</td>";
		echo "<td>" . $value->getExternoStr() . "</td>";
		echo "<td>" . $visor->getEditLink( $id ) . "</td>";
        echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
		echo "</tr>";
	}
echo "</table>";
?>

