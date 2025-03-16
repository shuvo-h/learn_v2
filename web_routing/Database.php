<?php


    // step 1: connect to database and execute a query
    class Database {
        public $connection;

        public function __construct($config,$DB_USERNAME,$DB_PASSWORD){
            

            // dd(http_build_query($config,'',';'));

            // $dsn = "mysql:host=sql12.freesqldatabase.com;port=3306;dbname=sql12766887;charset=utf8mb4"; 
            $dsn = "mysql:" . http_build_query($config,'',';');

            $this->connection = new PDO($dsn,$DB_USERNAME,$DB_PASSWORD,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
            ]);
        }

        public function query($query,$params=[]){
            // $params are the dynamic values come from user,
            // $query are our main query string, which will be replaced by params later
            $statement = $this->connection->prepare($query);
            $statement->execute($params); 
            // return $statement->fetchAll(PDO::FETCH_ASSOC);
            return $statement;

        }
    }
    
    /*
    // step 2: create an instance of the database class
    $db = new Database();

    // step 3: make a query
    $posts =  $db->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);

    // step 4: show the data
    foreach($posts as $post){
        echo "<li>" . $post["fname"] . " = " . $post["email"];
    }
    */



?>