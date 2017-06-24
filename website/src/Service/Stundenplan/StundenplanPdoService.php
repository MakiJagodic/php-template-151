<?php
namespace MakiJagodic\Service\Stundenplan;

use MakiJagodic\Service\Stundenplan\StundenplanService;
use MakiJagodic\Entity\Lektion;
use MakiJagodic\Entity\Fach;

class StundenplanPdoService implements StundenplanService
{
	private $pdo;
	public function __construct(\Pdo $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function getLektionen()
	{
		$stmt = $this->pdo->prepare("SELECT * FROM lektion ORDER BY lektionsTag, lektionsBeginn");
		$stmt->execute();
		
		// $lektionen = [];
		
		while($row = $stmt->fetchObject()) {
			// $lektionen[] = new Lektion();
			yield new Lektion($row->Id, 
					$row->fach, 
					$row->lektionsTag, 
					$row->lektionsBeginn, 
					$row->lektionsEnde);
		}
		
		// return $lektionen;
	}
	public function getFach()
	{
		$stmt = $this->pdo->prepare("SELECT * FROM fach");
		$stmt-> execute();
		while ($row = $stmt->fetchObject()){
			yield new Fach($row->Id, $row->bezeichnung, $row->kuerzel);
		}
		
	}
	
}