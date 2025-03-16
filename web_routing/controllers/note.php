<?php
// access this name in views/partials/banner.php
    $heading = "Single Note";


    $config = require("config.php");
    $db = new Database($config['database'],$config['database']['username'],$config['database']['password']);

    $query_id = $_GET['id'];
    
    $note = $db->query('select * from notes where id = :note_id',['note_id'=>$query_id])->fetch();


    require "views/note.view.php"


?>