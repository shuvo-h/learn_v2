
<?php
// connect to database 

class Database {

    // define variables 
    private $dbserver = "";
    private $dbuser = "s";
    private $dbport = "3306";
    private $dbname = "";
    private $dbpassword="";
    protected $conn;

    // generate constructor
    public function __construct(){
        try {
            $dsn="mysql:host={$this->dbserver}; dbname={$this->dbname}; charset=utf8";
            $options=array(PDO::ATTR_PERSISTENT=>true);
            $this->conn = new PDO($dsn,$this->dbuser,$this->dbpassword,$options);
            // echo "✅ DB Connected!";
        } catch (PDOException  $e) {
            echo "DB connectin error".$e->getMessage();
        }
    }

}

?>