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
	
	public function getLektionen()
	{
		$stmt = $this->pdo->prepare("SELECT * FROM lektion ORDER BY lektionsBeginn");
		$stmt->execute();
		
		$lektionen = [];
		
		while($row = $stmt->fetchObject()) {
			// $lektionen[] = new Lektion();
			yield new Lektion($Id->Id, 
					$row->fach, 
					$row->lektionsTag, 
					$row->lektionsBeginn, 
					$row->lektionsEnde);
		}
		
		// return $lektionen;
	}
	
}