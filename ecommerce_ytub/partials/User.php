<?php
require_once "Database.php";

// Instead of creating a new database connection inside each method or class, you can use dependency injection to pass the database connection into your class. 

class User extends Database{
    protected $tableName ="users";


    // Insert new row
    public function add($data){
        if (!empty($data)) {
            $fields = $placeholder = [];
            foreach($data as $field=>$value){
                $fields[]=$field;
                $placeholder[]=":{$field}";
            }
        }
        // $sql = "INSERT INTO {$this->tableName} (fname,email,phone) VALUES (:fname,:email,:phone)";
        $sql = "INSERT INTO {$this->tableName} (". implode(',',$fields).") VALUES(". implode(',',$placeholder).")";

        // insted of new connection each time, use sql injection to reuse the old connection
        $statement = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $statement->execute($data);
            $lastInsertedId=$this->conn->lastInsertId();
            $this->conn->commit();
            return $lastInsertedId;
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
            $this->conn->rollback();
            return false;
        }
        return false;
    }


    // Get rows 
    public function getRows($start=0,$limit=4){
        $sql = "SELECT * FROM {$this->tableName} ORDER BY DESC LIMIT {$start},{$limit}";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            $results = $statement->fetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC will return only data, not with index
        }else{
            $results = [];
        }
        return $results;
    }

    // get single row  
    public function getRow($field,$value){
        $sql = "SELECT * FROM {$this->tableName} WHERE {$field}=:{$field}";
        $statement = $this->conn->prepare($sql);
        // Bind the actual value to the placeholder
    $statement->bindParam(":{$field}", $value);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }else{
            $result = [];
        }
        return $result;
    }

    // count number of rows
    public function getCount(){
        $sql = "SELECT count(*) as pcount FROM {$this->tableName}";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC); 
        return $result['pcount'];
    }

    // upload photo or files 
    public function uploadPhoto($file){
        if (!empty($file)) {
            $fileTempPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileType = $file['type'];
            $fileNameCmps = explode(".",$fileName); // to know the file extension from last index
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time().$fileName) . '.' . $fileExtension;
            $allowedExtensions = ["png","jpg","jpeg"];
            if (in_array($fileExtension,$allowedExtensions)) {
                $uploadFileDir = getcwd() . "/uploads/";
                $destFilePath = $uploadFileDir . $newFileName;
                if (move_uploaded_file($fileTempPath,$destFilePath)) {
                    return $newFileName;
                }
            }
        }
        return false;
    }

    // Update method
    // Delete method
    // search in table method
    
}

?>