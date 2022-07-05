<?php
	namespace App\Models;
	use App\Database;
	use App\Models\CurrentUser;
use PDO;

	class Portfolio extends Database
	{
		public function getPortfolioByUserId()
		{
			$userObject = new CurrentUser;
			$userId = $userObject->getUserIdByToken();
			$statement = $this->connect->prepare("SELECT id FROM `portfolios` WHERE user_id = :userId");
			$statement->execute(array('userId' => $userId['id']));
			return $statement->fetch(PDO::FETCH_ASSOC);
		}
		
		public function createUserPortfolio($token)
		{
			$statement = $this->connect->prepare("SELECT id FROM `users` WHERE token = :token");
			$statement->execute(array('token' => $token));
			$userId = $statement->fetch(PDO::FETCH_ASSOC);
			$statement = $this->connect->prepare("INSERT INTO `portfolios` (user_id) VALUES (:userId)");
			$statement->execute(array('userId' => $userId['id']));
			return true;
		}
	}