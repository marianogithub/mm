
<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="text-right" style="margin:4px;">
<?php
 echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'" , 'class' => "btn btn-danger"  ) );
?>
</div>

<?php
	$urlPermiso = Kohana::$index_file . "/Permiso/index/id=";
		//encabezado de la tabla.-
	echo "<table class='table table-condensed table-bordered table-hover' >";
	echo "<thead><tr class='bg-inverse'>";
	foreach( $visor->getNombreColumnas() as $key => $value )
	{
		echo "<th>$value</th>";
	}
	echo "</tr></thead>";

	//datos de la tabla.-
	foreach( $visor->getListado() as $key => $value )
	{
		$id = $value->pk();
        $claseFila = $value->habilitado == 1 ? "success" : "danger";
        echo "<tr class='$claseFila' >";
		echo "<td>$value->nombre</td>";
		echo "<td class='bool'>" . ($value->habilitado == 1 ? "Si" : "No") . "</td>";
		$nombreColumna = "";
		$permisos = $value->permisos->find_all();
        $nombreColumna = "Agregar/Quitar Permiso";
		if( sizeof( $permisos ) > 0 ) {
            $nombreColumna = "";
			foreach( $permisos as $permiso ){
				$nombreColumna .= ", " . $permiso->menu->nombre;
			}
			$nombreColumna = substr( $nombreColumna, 2 );
		}
		echo "<td>" . html::anchor( $urlPermiso . $id, $nombreColumna ) . "</td>";
		echo "<td>" . $visor->getEditLink( $id ) . "</td>";
        echo "<td>" . $visor->getDeleteLink( $id, "Inhabilitar" ) . "</td>";
		echo "</tr>";
	}
echo "</table>";
?>
