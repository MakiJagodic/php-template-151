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
					$row->rolleid);
		}
	}
	public function getRolleFromUser($email)
	{
		$stmt = $this->pdo->prepare("SELECT rolleid FROM user WHERE email=?");
		$stmt->bindValue(1, $email);
		$stmt->execute();
		return $stmt->fetch();
	}
	public function updateUser($data)
	{
		foreach ($data as $user)
		$stmt = $this->pdo->prepare("Update user Set rolleid=? WHERE email=?");
		$stmt->bindValue(1, $user["rolleid"]);
		$stmt->bindValue(2, $user["email"]);
		
		$stmt->execute();
		return $stmt->rowCount() == 1;
	}
}