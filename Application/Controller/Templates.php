<?php
require_once dirname(__FILE__).'/../../Application/Vendors/twig/lib/Twig/Autoloader.php';
	
class Templates
{
	
	function __construct() {
		$this->Twig();
	}
	
	public function Twig() {
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem(dirname(__FILE__) . '/../../Public/Templates');
		$twig   = new Twig_Environment($loader);
		$twig->addExtension(new Twig_Extensions_Extension_Text());
		return $twig;
	}
}


	$template = new Templates();
	$view = $template->Twig();