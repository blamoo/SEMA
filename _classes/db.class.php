<?php
class db
{
	public $rowCount = 0;
	public $lastInsertId = -1;
	
	private $pdo;
	private static $instance;
	
	private static $default_schema;
	private static $default_user;
	private static $default_pass;
	
	private function __construct($schema, $user, $pass)
	{
		try
		{
			$this->pdo = new PDO('mysql:host=127.0.0.1;dbname=' . $schema, $user, $pass);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->exec('SET NAMES \'utf8\';');
		}
		catch (Exception $e)
		{
			header('Content-Type: text/plain; charset=utf-8');
			exit('Ocorreu um erro durante a conexão com o banco de dados. Verifique a conectividade, nome de usuário e senha.');
		}
		
	}
	
	public static function instance()
	{
		if (!isset(self::$instance)) 
		{
			self::$instance = new self(self::$default_schema, self::$default_user, self::$default_pass);
		}
		return self::$instance;
	}
	
	public static function set_defaults($schema = 'mysql', $user = 'root', $pass = '')
	{
		self::$default_schema = $schema;
		self::$default_user = $user;
		self::$default_pass = $pass;
	}

	public function error()
	{
		return $this->pdo->errorInfo();
	}
	
	public function get_row_list($fquery, $params = array())
	{
		$db = $this->pdo->prepare($fquery);
		
		$db->execute($this->parse_params($params));
		$this->rowCount = $db->rowCount();
		
		return $db->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function get_row($fquery, $params = array())
	{
		$db = $this->pdo->prepare($fquery);

		$db->execute($this->parse_params($params));
		$this->rowCount = $db->rowCount();
		
		return $db->fetch(PDO::FETCH_ASSOC);
	}
	
	public function query($fquery, $params = array())
	{
		$db = $this->pdo->prepare($fquery);
		
		$ret = $db->execute($this->parse_params($params));
		$this->rowCount = $db->rowCount();
		$this->lastInsertId = $this->pdo->lastInsertId();
		
		return $ret;
	}

	public function get_count($fquery, $params = array())
	{
		$db = $this->pdo->prepare($fquery);

		$db->execute($this->parse_params($params));
		
		return $this->rowCount = $db->rowCount();
	}
	
	private function parse_params($params)
	{
		if (is_null($params))
			return array(null);
		
		elseif(is_array($params))
			return $params;
		
		else
			return (array) $params;
	}
}
?>