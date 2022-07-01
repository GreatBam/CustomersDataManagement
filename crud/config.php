<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database
{

    public $isConnected;
    protected $datab;

    //connect to db
    public function __construct($server, $user, $password, $dbname)
    {
        $this->isConnected = true;
        try {
            $this->datab = new PDO("mysql:host={$server};dbname={$dbname};", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new exception($e->getMessage());
        }
    }

    //disconnect from db
    public function disconnect()
    {
        $this->isConnected = false;
        $this->datab = null;
    }

    //get row
    public function getRow($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e) {
            throw new exception($e->getMessage());
        }
    }

    //get rows
    public function getRows($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new exception($e->getMessage());
        }
    }

    //insert row
    public function insertRow($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $this->datab->lastInsertId();
        } catch (PDOException $e) {
            throw new exception($e->getMessage());
        }
    }

    public function execute($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            throw new exception($e->getMessage());
        }
    }

    //update row
    public function updateRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }

    //delete row
    public function deleteRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }

}

// test database
$server = "localhost";
$user = "root";
$password = "";
$dbname = "data";

$dbConn = new Database($server, $user, $password, $dbname);

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Customers data manager</h1>
                <a href="home.php"><i class="fas fa-home"></i>Home</a>
                <a href="index.php"><i class="fas fa-address-book"></i>Contacts</a>
            </div>
        </nav>
    EOT;
}

function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}