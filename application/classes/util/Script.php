<?php
defined( 'APPPATH' ) OR die( 'No Direct Script Access' );
require_once 'application/config/server.php';

class Script
{
	private $separador;
	private $basePath;
	private $jsPath;
	private $cssPath;

	private $libsjs;
	private $libscss;

	function __construct()
	{
		$this->separador = "/";
		$this->basePath =  Server::$dominio . $this->separador;
		$this->jsPath	=  $this->basePath . "javascript" . $this->separador;
		$this->cssPath	=  $this->basePath . "css" . $this->separador;

		$this->libsjs = array
		(
			//"jquery-1.8.2.min.js",
            "jquery-1.11.1.min.js",
            "jquery-ui-1.11.2.min.js",
			"bootstrap.js",
			"bootstrap.min.js",
			"bootstrap-select.js",
            "bootstrap-tooltip.js",
            "bootstrap-transition.js",
            "bootstrap-confirmation.js"

		);

		$this->libscss = array
		(
			//"ui-lightness/jquery-ui-1.8.24.custom.css",
            "ui-lightness/jquery-ui-1.11.2.min.css",
			"bootstrap.css",
			"bootstrap.min.css",
			"bootstrap-theme.css",
			"bootstrap-theme.min.css",
			"bootstrap-select.css",
			"sge.css",
            "font-awesome/css/font-awesome.css"
		);
	}

	public function getJSLibsAll()
	{
		$libsStr = "";

		foreach( $this->libsjs as $key => $value )
		{
			$libsStr .= $this->getJSLib( $key );
		}

		return $libsStr;
	}

	public function getJSLib( $lib )
	{
		return $this->getHTMLscript( $this->libsjs[ $lib ] );
	}

	public function getCssAll()
	{
		$cssStr = "";

		foreach( $this->libscss as $key => $value )
		{
			$cssStr .= $this->getCss( $key );
		}

		return $cssStr;
	}

	public function getCss( $lib )
	{
		return $this->getHTMLcss( $this->libscss[ $lib ] );
	}

	private function getHTMLscript( $filename )
	{
		$finalName = $this->jsPath . $filename;
		return "<script src='$finalName' ></script>";
	}

	private function getHTMLcss( $filename )
	{
		$finalName = $this->cssPath . $filename;
		return "<link rel='stylesheet' type='text/css' href='$finalName' ></link>";
	}
}
?>