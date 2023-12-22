<?php
/*
 * PDO Database Class
 * Connect to Database
 */

namespace App\Database;
use PDO;
use PDOException;
use function functions\main\abort;

class Database
{
    // Database connection parameters
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $dbname = "demo";
    private $pdo;
    private $stmt;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        // Set DSN (Data Source Name)
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";

        // PDO connection options
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,          
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     
            PDO::ATTR_EMULATE_PREPARES => false,                
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function findAll()
    {
        return $this->stmt->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }
}
