<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php require_once 'application/classes/security/User.php'; ?>
<?php require_once 'application/classes/util/Script.php'; ?>
<?php require_once 'application/config/server.php'; ?>

<head>
<?php
echo "<link rel='shortcut icon' href='" . Server::$dominio . "/favicon.png' />";

$pie = ORM::factory( "parametro" )->getPie();
$tienePie = $pie != null && strcmp("", $pie) != 0;
$paddingBottom = "padding-bottom: " . ($tienePie ? "70" : "0") . "px;";
echo $head;
$scripts = new Script();

echo $scripts->getJSLibsAll();
echo $scripts->getCssAll();

?>

<script type="text/javascript">

$(document).ready(function(){

	$(".dropdown-toggle").dropdown();
	$('.selectpicker').selectpicker();

});  

</script>

<style type="text/css">

    .navbar {
        min-height: 30px;
    }

    .navbar-brand {
        padding: 5px 15px;
    }
    .navbar-toggle {
        margin-top: 2px;
        margin-bottom: 2px;
    }

    body{
        <?php echo $paddingBottom; ?>
        padding-top: 70px;
    }
</style>
</head>
<?php 
	$hrefWelcome = "href='" . Server::$dominio . "/" . Server::$indexFile . "/'";
?>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="color:#fff; padding-top:20px;">
		<div class="container">    
			<div class="navbar-header">
				<a <?php echo $hrefWelcome;?> >		
					<span class="glyphicon glyphicon-random" style="font-size:24px; color:#fff;">
					 	<strong><?php echo ORM::factory( "parametro" )->getAbreviaturaSistema();?></strong>
					</span>		
				</a>
			</div>

            <ul class="nav nav-pills navbar-right" >
					<li class="dropdown">
						<?php
							$user = User::getInstance();
							if( $user != null && $user->getUserLog() != null ) {
								?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size: 16px;"><?php echo $user->getUserLog()->username;?><span class="caret"></span></a>
                                <ul class="dropdown-menu"  style="color:#000000;">
										<li><a href="#"><i class='fa fa-user fa-fw'></i><?php echo $user->getUsuario()->nombre ?></a></li>
										<li> 
											<?php
												if(  $user->getUsuario()->tienePermisoAdministracion() ) {
													$urlAdministracion = Server::$dominio . "/" . Server::$indexFile . "/Administracion";
													echo "<a href='$urlAdministracion'><i class='fa fa-wrench fa-fw'></i>Administrar</a>";
												}
											?>
										</li>
                                        <li class="divider"></li>
										<li class="bg-muted">
											<?php 
											$urlLogout	= Kohana::$index_file . "/Log/desloguear";
											echo html::anchor( $urlLogout, "<i class='fa fa-times fa-fw'></i><strong>Salir</strong>" );
											?>
										</li>
										
									</ul>
							<?php 
							}
						?>
					</li>
				</ul>

		
			<ul class="nav nav-pills nav">
				<?php
					$url = Server::$dominio . "/" . Server::$indexFile . "/";
				
					$menuVista = MenuVista::getInstance();
					$menus = $menuVista->getMenus();
					if( !is_null( $menus ) ) {
						$principal = ORM::factory( "Tipomenu" )->principal;
						foreach( $menus as $menu )
						{
							if( $menu->visible == 1 && $menu->idtipomenu == $principal ) {
								echo "<li><a href='$url" . $menu->url . "/' >" . $menu->nombre . "</a></li>";
							}
						}
					}
				?>
			</ul>
		</div>
	</nav>
	<div class="container">
		<?php
			echo $body;
		?>
	</div>

    <?php
        $pie = ORM::factory( "parametro" )->getPie();
        if($pie != null && strcmp("", $pie) != 0) {
            echo "<nav class='navbar navbar-default navbar-fixed-bottom' role='navigation'>";
            echo "<div class='navbar-header'>";
            echo "<!--<a class='navbar-brand' href='#'>TutorialsPoint</a>-->";
            echo "</div>";
            echo "<div class='navbar-text navbar-right' style='padding: 0px 10px 0px 0px'>";
            echo "<h4><i>$pie</i></h4>";
            echo "</div>";
            echo "</nav>";
        }
    ?>


</body>
</html>
<script type="text/javascript">

    !function ($) {

        $(function(){

            $('[data-toggle="confirmation"]').confirmation();
            $('[data-toggle="confirmation-singleton"]').confirmation({singleton:true});
            $('[data-toggle="confirmation-popout"]').confirmation({popout: true});

        })

    }(window.jQuery)
</script>

</script>