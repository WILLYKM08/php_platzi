<?php

namespace Framework;

use PDO;

class Database
{
  private $connection;
  private $statement;

  public function __construct()
  {
    $dsn = 'pgsql:host=localhost;dbname=php_db';
    $this->connection = new PDO($dsn, 'postgres', 'Admin1994**');
  }

  public function query($sql, $params = [])
  {
    $this->statement = $this->connection->prepare($sql);
    $this->statement->execute($params);
    return $this;
  }

  public function get()
  {
    return $this->statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function firstOrFail()
  {
    $result = $this->statement->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
      http_response_code(404);
      exit('404 Not Found');
    }
    return $result;
  }
}