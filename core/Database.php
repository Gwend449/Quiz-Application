<?php

namespace app\core;
require_once __DIR__ . '/../src/config.php';

class Database {
   
   public \PDO $pdo;
   public function __construct($config = [])
   {
      $dbDsn = $config['dsn'] ?? '';
      $username = $config['username'] ?? '';
      $password = $config['password'] ?? '';
      $this->pdo = new \PDO($dbDsn, $username, $password);
      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
   }

   public function prepare($sql)
   {
      return $this->pdo->prepare($sql);
   }

}