<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="pull-right" style="margin:4px;">
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
	if( $visor->getListado() != null )
	{
		foreach( $visor->getListado() as $key => $value )
		{
			$id = $value->pk();
			echo "<tr>";
			echo "<td>$value->concepto</td>";
			echo "<td>".$value->gremioObservacion->nombre."</td>";

			echo "<td>" . $visor->getEditLink( $id ) . "</td>";
            echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
			echo "</tr>";
		}
	}
echo "</table>";
?>