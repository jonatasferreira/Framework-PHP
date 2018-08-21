<?php

use PDO;
use PDOException;

/**
 * Database Connection
 *
 * @package config
 */
class DataBase
{
	/**
	 * Makes the connection to the database
	 *
	 * @return connection to the database
	 * @access public
	 */
	public function getDataBase()
	{
		$conf = include_once __DIR__."/../app/config/database.php";
		if (strcmp($conf['driver'], 'sqlite') === 0) {
			$sqlite = __DIR__."/../database/".$conf['sqlite']['host'];
			$sqlite = 'sqlite'.$sqlite;
			try{
				$pdo = new PDO($sqlite);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				return $pdo;
			}catch (PDOException $e) {
				echo $e->getMessagem();
			}
		}elseif(strcmp($conf['driver'], 'mysql') === 0) {
			$host = $conf['mysql']['host'];
			$db = $conf['mysql']['database'];
			$user = $conf['mysql']['user'];
			$pass = $conf['mysql']['pass'];
			$charset = $conf['mysql']['charset'];
			$collation = $conf['mysql']['collation'];

			try{
				$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES '$charset' COLLATE '$collation'");
				$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				return $pdo;
			}catch (PDOException $e) {
				echo $e->getMessagem();
			}
		}
	}
}