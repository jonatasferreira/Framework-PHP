<?php

namespace Core;

/**
 * Classe base para os controllers
 */
abstract class BaseController
{
	protected $view;
	private $viewPath;
	
	/**
	 * Construtor da classe
	 */
	public function __construct()
	{
		$this->view = new \stdClass;
	}

	/**
	 * Rederiza uma view
	 */
	protected function renderView($viewPath)
	{
		$this->viewPath = $viewPath;
		$this->content();
	}

	/**
	 * Carregar o conteúdo da view
	 */
	protected function content()
	{
		if(file_exists(__DIR__."/../app/Views/{$this->viewPath}.phtml")) {
			require_once __DIR__."/../app/Views/{$this->viewPath}.phtml";
		}else {
			echo "Error: View path not found!";
		}
	}
}