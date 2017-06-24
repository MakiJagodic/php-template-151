<?php

namespace MakiJagodic\Entity;
class User
{
	private $Id;
	private $email;
	private $rolleId;


	function __construct($newId, $newEmail, $newRolleId)
	{
		$this->Id = $newId;
		$this->email = $newEmail;
		$this->rolleId = $newRolleId;
	}

	function getId()
	{
		return $this->Id;
	}
	function getEmail()
	{
		return $this->email;
	}
	function getRolleId()
	{
		return $this->rolleId;
	}

}