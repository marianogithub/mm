<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>


<div class="text-right" style="margin:4px;">
<?php
 echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'" , 'class' => "btn btn-danger"  ) );
?>
</div>
<?php
$urlMostrarRol  = Kohana::$index_file . "/User/mostrarrol/id=";
$urlPersona     = Kohana::$index_file . "/Usuario/";

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
		foreach( $visor->getListado() as $key => $value ) {
            $id = $value->pk();
			echo "<td>$value->username</td>";
			echo "<td>$value->email</td>";
			echo "<td align='right' >" . $value->getLastLoginStr() . "</td>";
			echo "<td align='center'>" . html::anchor( $urlMostrarRol . $value->id, "Agregar/Quitar" ) . "</td>";
            $usuarioUrl = $urlPersona;
            $nombreColumna = "CREAR PERSONA";

            try {
                $persona = $value->getPersona();
                if(is_null($persona)){
                    $usuarioUrl .= "new/userid=" . $value->id;
                } else {
                    $usuarioUrl .= "edit/id=" . $persona->pk();
                    $nombreColumna = $persona->getFullName();
                }
            } catch( Exception $e ) {
                $nombreColumna = "MAS DE UNA PERSONA";
            }
			echo "<td>". html::anchor( $usuarioUrl, $nombreColumna, array( "target" => "_blank" ) ) ."</td>";
			echo "<td class='linkEdit'>" . $visor->getEditLink( $id ) . "</td>";
			echo "<td class='linkEliminar'>" . $visor->getDeleteLink( $id, "Inhabilitar" ) . "</td>";
			echo "</tr>";
		}
	}
echo "</table>";
?>
