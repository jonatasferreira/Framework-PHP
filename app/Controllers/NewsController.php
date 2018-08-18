<?php

namespace App\Controllers;

use Core\BaseController;

/**
 * Classe Notícias
 */
class NewsController extends BaseController
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
		echo 'news';
	}

	/**
	 * Para exibir uma new.
	 * 
	 * @param $id: Id da new.
	 * @access public
	 */
	public function getNew($id, $request)
	{
		echo 'new id: '.$id.'<br>';
		echo $request->get->nome.'<br>';
		echo $request->get->idade.'<br>';
	}
}