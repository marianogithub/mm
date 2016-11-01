<?php defined('SYSPATH') or die('No direct script access.');

class MenuVista {
	private static $menuVista = null;
	private $menus = null;

	private function __construct() {
		
	}

	public static function getInstance() {
		if( is_null( MenuVista::$menuVista ) ) {
			MenuVista::$menuVista = new MenuVista();
		}

		return MenuVista::$menuVista;
	}

	public function setMenus( $menusParam ){
		$this->menus = $menusParam;
	}

	public function getMenus(){
		return $this->menus;
	}
}