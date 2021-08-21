<?php 


class DB{

	private $link;
	private $engine;
	private $host;
	private $name;
	private $user;
	private $pass;
	private $charset;

	public function __construct(){

		$this -> engine = ES_LOCAL ? DB_ENGINE : DB_ENGINE_PROD;
		$this -> host = ES_LOCAL ? DB_SERVER : DB_SERVER_PROD;
		$this -> name = ES_LOCAL ? DB_NAME : DB_NAME_PROD;
		$this -> user = ES_LOCAL ? DB_USER : DB_USER_PROD;
		$this -> pass = ES_LOCAL ? DB_PASS : DB_PASS_PROD;
		$this -> charset = ES_LOCAL ? DB_CHARSET : DB_CHARSET_PROD;

		return $this;

	}

	/**
	 * Método para abrir nuestra conexión a la base de datos
	 * @return [type] [description]
	 */
	private function connect(){

		try{

			$this -> link = new PDO($this->engine.':host='.$this->host.';dbname='.$this->name, $this->user, $this->pass);

			return $this -> link;

		} catch (\PDOException $e) {

		    die(sprintf("Error a la conexión a la base de datos, hubo un error: %s", $e->getMessage()));

		} catch (Exception $e) {

		    die(sprintf("Error a la conexión a la base de datos, hubo un error fatal: %s", $e->getMessage()));

		}


	}

	/**
	 * Método para hacer querys a la base de datos
	 * @param  [type] $sql    [description]
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	public static function query($sql, $params = []){

		$db = new self();
		$link = $db -> connect(); // Conexión a nuestra base de datos
		$link -> beginTransaction(); // En caso de cualquier error, se hace un rollback
		$query = $link -> prepare($sql);

		if (!$query -> execute($params)) {
			
			$link -> rollBack();
			$error = $query -> errorInfo();

			// Index 0 tipo de error
			// Index 1 Codigo de error
			// Index 2 el mensaje del error
			
			throw new Exception($error[2]);			

		}

		if (strpos($sql, 'SELECT') !== false) {

			return $query -> rowCount() > 0 ? $query -> fetchAll() : false;

		}
		elseif (strpos($sql, 'INSERT') !== false) {

			$id = $link->lastInsertId(); // Almacena el ultimo ID almacenado 
			$link -> commit(); // Guarda los cambios
			return $id; // Retorna el ID

		}
		elseif (strpos($sql, 'UPDATE') !== false) {

			$link -> commit();
			return true;

		}
		elseif (strpos($sql, 'DELETE') !== false) {

			if ($query -> rowCount() > 0) {
				$link -> commit();
				return true;
			}

			$link -> rollBack();
			return false;

		}
		else{

			$link -> commit();
			return true;

		}	

	}

}