<?php

namespace App\Controllers;

use Core\BaseController;

/**
 * Classe home
 */
class HomeController extends BaseController
{
	/**
	 * Construtor da classe.
	 * 
	 * @access public
	 */
	public function __construct()
	{
		# code...
	}

	/**
	 * Método para página index.
	 * 
	 * @access public
	 */
	public function index()
	{
		$this->view->nome = "Framework php";
		$this->renderView("home/index");
	}
}