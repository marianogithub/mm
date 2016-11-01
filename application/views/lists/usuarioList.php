<?php require_once 'application/classes/Parametros.php'; ?>

<div class="text-right" style="margin:4px;">
<?php
 echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'" , 'class' => "btn btn-danger"  ) );
?>
</div>

<div class="encabezado"><?php echo $visor->getEncabezado(); ?></div>
<?php
	$urlPermiso = Kohana::$index_file . "/Permiso/index/id=";
	$urlUser	= Kohana::$index_file . "/User/edit/id=";
    $urlRol     = Kohana::$index_file . "/Rol/";

	//encabezado de la tabla.-
echo "<table class='table table-condensed table-bordered table-hover'>";
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
            $claseFila = $value->habilitado == 1 ? "success" : "danger";
            echo "<tr class='$claseFila' >";
			echo "<td>" . $value->getFullName() . "</td>";
			//echo "<td>$value->domicilio</td>";
			//echo "<td>$value->telefono</td>";
			//echo "<td>$value->celular</td>";
			echo "<td>$value->email</td>";
			echo "<td class='bool'>" . ($value->habilitado == 1 ? "Si" : "No") . "</td>";

            $columna = "";
            if(is_null( $value->idrol)){
                $permisos = $value->obtenerPermisos();
                $nombreColumna = "Agregar/Quitar Permisos";

                if( sizeof( $permisos ) > 0 ) {
                    $nombreColumna = "";

                    foreach( $permisos as $permiso ){
                        $nombreColumna .= ", " . $permiso->menu->nombre;
                    }
                    $nombreColumna = substr( $nombreColumna, 2 );
                }
                $columna = html::anchor( $urlPermiso . $id, $nombreColumna );
            } else {
                $columna = html::anchor( $urlRol, $value->rol->nombre, array( "target" => "_blank" ) );
            }
			echo "<td>";
            echo $columna;
			echo "</td>";
			if( $value->iduser != null ){
				echo "<td>" . html::anchor( $urlUser . $value->iduser, $value->user->username, array( "target" => "_blank" ) ) . "</td>";
			}
			else
			{
				echo "<td>No tiene cuenta</td>";
			}
			echo "<td>" . $visor->getEditLink( $id ) . "</td>";
            echo "<td>" . $visor->getDeleteLink( $id, "Inhabilitar" ) . "</td>";
			echo "</tr>";
		}
	}
echo "</table>";
?>
