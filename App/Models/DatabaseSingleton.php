<?php

	namespace App\Models;
	use PDO;

	class DatabaseSingleton
	{
		public static ?PDO $databaseInstance = null;

		public static function getDatabase()
		{
			if (!static::$databaseInstance) {
				static::$databaseInstance = new PDO('mysql:host=localhost;dbname=bellum4n_invest', 'bellum4n_invest', 'qer25ytbh_3#@ngh');
			}

			return static::$databaseInstance;
		}
	}