<?php
class Lektion {
	private $Id;
	private $fach;
	private $lektionsTag;
	private $lektionsBeginn;
	private $lektionsEnde;
	
	function __construct()
	{
		$this->Id = $newId;
		$this->fach = $newFach;
		$this->lektionsTag = $newLektionsTag;
		$this->lektionsBeginn = $newLektionsBeginn;
		$this->lektionsEnde = $newLektionsEnde;
	}
	
	function get_Id($newId)
	{
		return $this->Id;
	}
	function get_fach($newFach) 
	{ 
		return $this->fach; 
	}
	function get_lektionsTag($newLektionsTag)
	{
		return $this->lektionsTag;
	}
	function get_letkionsBeginn($newLektionsBeginn)
	{
		return $this->lektionsBeginn;
	}
	function get_letkionsEnde($newLektionsEnde)
	{
		return $this->lektionsEnde;
	}
	
}