<?php
namespace MakiJagodic\Service\Stundenplan;

use MakiJagodic\Service\Stundenplan\StundenplanService;


class StundenplanPdoService implements StundenplanService
{
	private $pdo;
	public function __construct(\Pdo $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function getLektionen($email)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM lektion");
		$stmt->execute();
			
		return $stmt;
	}
	
}