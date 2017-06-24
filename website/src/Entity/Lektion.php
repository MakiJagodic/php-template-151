<?php

namespace MakiJagodic\Entity;

class Lektion {
	private $Id;
	private $fach;
	private $lektionsTag;
	private $lektionsBeginn;
	private $lektionsEnde;
	
	function __construct($newId, $newFach, $newLektionsTag, $newLektionsBeginn, $newLektionsEnde)
	{
		$this->Id = $newId;
		$this->fach = $newFach;
		$this->lektionsTag = $newLektionsTag;
		$this->lektionsBeginn = $newLektionsBeginn;
		$this->lektionsEnde = $newLektionsEnde;
	}
	
	function getId()
	{
		return $this->Id;
	}
	function getFach() 
	{ 
		return $this->fach; 
	}
	function getLektionsTag()
	{
		return $this->lektionsTag;
	}
	function getLetkionsBeginn()
	{
		return $this->lektionsBeginn;
	}
	function getLetkionsEnde()
	{
		return $this->lektionsEnde;
	}
	
}