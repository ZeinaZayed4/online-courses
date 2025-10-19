<?php

namespace App;

use PDO;

class Database
{
	private string $host = 'localhost';
	private string $dbname = 'online_courses';
	private string $username = 'root';
	private string $password = '';
	public PDO $connection;
	public $statement;
	
	
	public function __construct()
	{
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		
		$this->connection = new PDO($dsn, $this->username, $this->password, [
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			]
		);
	}
	
	public function query($query, $params = []): static
	{
		$this->statement = $this->connection->prepare($query);
		$this->statement->execute($params);
		
		return $this;
	}
	
	public function get()
	{
		return $this->statement->fetchAll();
	}
	
	public function find()
	{
		return $this->statement->fetch();
	}
}