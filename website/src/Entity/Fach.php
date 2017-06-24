<?php

namespace MakiJagodic\Entity;
class Fach
{
	private $Id;
	private $bezeichnung;
	private $kuerzel;
	
	
	function __construct($newId, $newBezeichnung, $newKuerzel)
	{
		$this->Id = $newId;
		$this->bezeichnung = $newBezeichnung;
		$this->kuerzel = $newKuerzel;
	}

	function getId()
	{
		return $this->Id;
	}
	function getBezeichnung()
	{
		return $this->bezeichnung;
	}
	function getKuerzel()
	{
		return $this->kuerzel;
	}
		
}