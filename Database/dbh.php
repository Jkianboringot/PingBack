<?php
namespace Database;

use PDO;
use PDOException;
class Dbh
{
    protected $dsn = 'mysql:host=localhost;dbname=learningphp';
    protected $dbname = 'root';
    protected $dbpwd = 'root';

    protected function connection()
    {
        try {
            $pdo = new PDO($this->dsn, $this->dbname, $this->dbpwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $th) {
            die('connection faileds' . $th->getMessage());
        }
    }
}
