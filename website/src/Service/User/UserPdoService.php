<?php
namespace MakiJagodic\Service\User;

use MakiJagodic\Service\User\UserService;
use MakiJagodic\Entity\User;

class UserPdoService implements UserService
{
	private $pdo;
	public function __construct(\Pdo $pdo)
	{
		$this->pdo = $pdo;
	}

	public function getUser()
	{
		$stmt = $this->pdo->prepare("SELECT * FROM user");
		$stmt->execute();
		while($row = $stmt->fetchObject()) {
			// $lektionen[] = new Lektion();
			yield new User($row->Id,
					$row->email,
					$row->rolleId);
		}
	}
	public function getRolleFromUser($email)
	{
		$stmt = $this->pdo->prepare("SELECT rolleId FROM user WHERE email=?");
		$stmt->bindValue(1, $email);
		$stmt->execute();
		return intval($stmt->fetch());
	}
}