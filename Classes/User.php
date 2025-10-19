<?php

namespace App;

use App\Validation\Str;
use PDO;

class User
{
	private int $id;
	private string $firstName;
	private string $lastName;
	private string $username;
	private string $email;
	private string $password;
	private string $role;
	
	public function __construct(private PDO $db)
	{
	}
	
	public function getId(): ?int
	{
		return $this->id;
	}
	
	public function getFirstName(): string
	{
		return $this->firstName ?? '';
	}
	
	public function setFirstName(string $firstName): self
	{
		$this->firstName = $firstName;
		return $this;
	}
	
	public function getLastName(): string
	{
		return $this->lastName ?? '';
	}
	
	public function setLastName(string $lastName): self
	{
		$this->lastName = $lastName;
		return $this;
	}
	
	public function getUsername(): string
	{
		return $this->username ?? '';
	}
	
	public function setUsername(string $username): self
	{
		$this->username = $username;
		return $this;
	}
	
	public function getEmail(): string
	{
		return $this->email ?? '';
	}
	
	public function setEmail(string $email): self
	{
		$this->email = $email;
		return $this;
	}
	
	public function getPassword(): string
	{
		return $this->password ?? '';
	}
	
	public function setPassword(string $password): self
	{
		$this->password = Str::hash($password);
		return $this;
	}
	
	public function getRole(): string
	{
		return $this->role ?? '';
	}
	
	public function setRole(string $role): self
	{
		$this->role = $role;
		return $this;
	}
}