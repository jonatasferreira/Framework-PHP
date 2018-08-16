<?php

namespace Core;

/**
 * Responsável por instanciar todos os controllers.
 */
class Container
{
	/**
	 * Instancia a classe controller passada.
	 * 
	 * @access public
	 */
	public static function newController($controller)
	{
		$objController = "App\\Controllers\\".$controller;
		return new $objController;
	}
}