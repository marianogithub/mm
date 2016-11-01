<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >

<?php
echo Form::hidden( "id", $visor->getObjeto()->pk());

if( sizeof( $visor->getObjeto()->getErrores() ) > 0 ) {
	echo "<div id='error'>"; 
	echo "<ul>";
	foreach( $visor->getObjeto()->getErrores() as $error ) {
		echo "<li>$error</li>";
	}
	echo "</ul>";
	echo "</div>";
}
?>
<div class="panel">
<br/>
	<?php
	$formulariosPermitidos = array();
	$usuario = User::getInstance()->getUsuario();
	if(!is_null($usuario)) {
		$idusuario = $usuario->getIdUsuarioParaPermisos();
		if(!is_null($idusuario)) {
			$formulariosCreados = ORM::factory( "menu" )->getMenusExpediente();
			if(sizeof($formulariosCreados) > 0) {
				$idFormularios = array();
				foreach ($formulariosCreados as $formularioCreado) {
					array_push($idFormularios, $formularioCreado->idmenu);
				}
			
				$permisosMenusExpedientes = ORM::factory( "permiso" )->where( "idusuario", "=", $idusuario )
				->and_where( "idmenu", "IN", $idFormularios )->order_by( "orden", "ASC" )->find_all();
				if(!is_null($permisosMenusExpedientes)) {
					foreach( $permisosMenusExpedientes as $permisoMenuExpediente ) {
						array_push($formulariosPermitidos, $permisoMenuExpediente->menu);
					}
				}
			}
		}
		?>
		<div class="panel-body">
			<?php 
			if(sizeof($formulariosPermitidos) > 0){
				$codigoActivo = $formulariosPermitidos[0]->codigo;
				$menusStr = "";
				//dibujamos las opciones de menu expediente.-
				$menusStr .= "<ul class='nav nav-pills nav-stacked col-md-2 well well-sm'>";
				foreach($formulariosPermitidos as $formularioPermitido) {
					$codigoActual = $formularioPermitido->codigo;
					$activeClass = strcmp($codigoActivo, $codigoActual) == 0 ? " class='active' " : "";
					$menusStr .= "<li $activeClass ><a href='#$codigoActual' data-toggle='pill' >";
					$menusStr .= $formularioPermitido->nombre;
					$menusStr .= "</a></li>";
				}
				$menusStr .= "</ul>";
				echo $menusStr;
				$nombreActual = "";
				echo "<div class='tab-content col-md-10'>";
				foreach($formulariosPermitidos as $formularioPermitido) {
					$codigoActual = $formularioPermitido->codigo;
					$activeClass = strcmp($codigoActivo, $codigoActual) == 0 ? "active" : "";
					$nombreActual = $formularioPermitido->nombre;
					echo "<div class='tab-pane $activeClass' id='$codigoActual' >";
					require_once $formularioPermitido->url;
					echo "</div>";
				} 
				echo "</div>";
			}
		}
		?>
		</div>
		<div class="panel-footer well well-sm">
			<div class="text-right ">
				<?php
					if($puedeGuardar) {
						echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ));
					}
				?>
				<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") );?>
			</div>
		</div>
	</div>
</form>