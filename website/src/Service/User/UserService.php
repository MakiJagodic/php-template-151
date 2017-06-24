<?php
namespace MakiJagodic\Service\User;

interface UserService
{
	public function getUser();
	public function getRolleFromUser($email);
	public function updateUser($data);
}