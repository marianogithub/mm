<?php require_once 'application/config/server.php'; ?>

<?php
$url = Server::$dominio . "/css/images/menu/";
$urlLink = Server::$dominio . "/" . Server::$indexFile . "/";
$columnas = 6;
if( !is_null( $visor->getObjeto() ) && sizeof( $visor->getObjeto() ) > 0 ) {

	foreach( $visor->getObjeto() as $supermenu ) {
		echo "<div>";   //Super menu
        $iconoSuperMenu = $supermenu->urlimagen != null && strcmp("", $supermenu->urlimagen) != 0 ? "<i class='".$supermenu->urlimagen."'></i>&nbsp;" : "";
        echo "<div><h3>" . $iconoSuperMenu . $supermenu->nombre . "</h3></div>";    //titulo

		$submenus = $supermenu->getSubmenus();
		if( !is_null( $submenus ) && sizeof( $submenus ) > 0 ) {
            $totalSubmenus = sizeof( $submenus );
            $continuar = true;
            $submenuIndex = 0;
            while($continuar) {
                echo "<div class='row' style='margin-top: 20px;' >";     //linea de submenues
                for( $i = 0; $i < $columnas && $submenuIndex < $totalSubmenus; $i++ ) {
                    $submenu = $submenus[ $submenuIndex ];
                    echo "<div class='col-md-2'>";     //cada boton
                    echo "<a class='btn btn-primary btn-block' href='$urlLink" . $submenu->url . "/' >" . $submenu->nombre . "</a>";
                    echo "</div>";
                    //$submenu->urlimagen
                    $submenuIndex++;
                }
                echo "</div>";
                if( $submenuIndex >= $totalSubmenus ) {
                    $continuar = false;
                }
            }
		}
		echo "</div><br/>";
	}
}
?>
</div>
