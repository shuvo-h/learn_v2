<?php
// access this name in views/partials/banner.php
    $heading = "Notes";


    $config = require("config.php");
    $db = new Database($config['database'],$config['database']['username'],$config['database']['password']);

    
    $notes = $db->query('select * from notes')->fetchAll();


    require "views/notes.view.php"


?>