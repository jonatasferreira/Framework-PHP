<?php

namespace Core;

/**
 * Classe responsável pela configuração das rotas do framework.
 *
 */
class Route
{
	/**
	 * Guarda as rotas da aplicação.
	 */
	private $routes;

	/**
	 * Construtor da classe.
	 * 
	 * @access public
	 */
	public function __construct(array $routes)
	{
		$this->setRoutes($routes);
		$this->run();
	}

	/**
	 * Método extrair o controller e a action das rotas.
	 * 
	 * @access private
	 */
	private function setRoutes($routes)
	{
		foreach ($routes as $route) {
			$explodeRoute = explode('@', $route[1]);
			$rt = [$route[0], $explodeRoute[0], $explodeRoute[1]];
			$newRoutes[] = $rt;
		}
		$this->routes = $newRoutes;
	}

	/**
	 * Método para capturar os GET's e POST's.
	 * 
	 * @access private
	 * @return stdClass
	 */
	private function getRequest()
	{
		$obj = new \stdClass;
		foreach ($_GET as $key => $value) {
			$obj->get->$key = $value;
		}
		foreach ($_POST as $key => $value) {
			$obj->post->$key = $value;
		}
		return $obj;
	}

	/**
	 * Método para obter a url.
	 * 
	 * @access private
	 * @return string: Url
	 */
	private function getUrl()
	{
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}

	/**
	 * Método onde ocorre toda lógica da classe.
	 * 
	 * @access private
	 */
	private function run()
	{
		// $url contém a url do cliente
		$url = $this->getUrl();
		$urlArray = explode('/', $url);
		// itera nas rotas definidas pelo programador
		foreach ($this->routes as $route) {
			$routeArray = explode('/', $route[0]);
			if(count($urlArray) == count($routeArray)) {
				// encontra os parâmetros passados na url.
				for ($i=0; $i < count($routeArray); $i++) { 
					if (is_numeric(strpos($routeArray[$i], '{'))) {
						$routeArray[$i] = $urlArray[$i];
						$params[] = $urlArray[$i];
						$route[0] = implode($routeArray, '/');
					}
				}
			}
			if (strcmp($url, $route[0]) == 0) {
				// echo 'url: '.$route[0].'<br>';
				// echo 'Controller: '.$route[1].'<br>';
				// echo 'Action: '.$route[2].'<br>';
				// foreach ($params as $value) {
				// 	echo 'params: '.$value.'<br>';
				// }
				$found = true;
				$controller = $route[1];
				$action = $route[2];
				break;
			}
		}
		if ($found) {
			$controller = Container::newController($controller);
			switch (count($params)) {
				case 1:
					$controller->$action($params[0], $this->getRequest());
					break;
				case 2:
					$controller->$action($params[0], $params[1], $this->getRequest());
					break;
				case 3:
					$controller->$action($params[0], $params[1], $params[2], $this->getRequest());
					break;
				default:
					$controller->$action( $this->getRequest());
					break;
			}
		}else {
			echo 'Página não encontrada!';
		}
	}
}