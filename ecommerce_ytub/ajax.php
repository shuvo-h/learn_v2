<?php

    // print_r($_REQUEST);
    // print_r($_FILES);
    // die;

    $action = $_REQUEST["action"];
    if (!empty($action)) {
        require_once 'partials/User.php';
        $obj = new User();
    }

    // add user action
    if ($action == 'adduser' && !empty($_POST)) {
        $fname=$_POST["fname"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $img=$_FILES["img"];

        $playerid = (!empty($_POST["userId"])) ? $_POST["userId"] : "";
        $imageName = "";
        if (!empty($img["name"])) {
            $imageName = $obj->uploadPhoto($img); // uploading photo and store the image name to insert into DB
            $playerData = [
                "fname" => $fname,
                "email" => $email,
                "phone" => $phone,
                "img" => $imageName,
            ];
        }else{
            $playerData = [
                "fname" => $fname,
                "email" => $email,
                "phone" => $phone,
            ];
        }

        $playerid = $obj->add($playerData);
        if (!empty($playerid)) {
            $player = $obj->getRow('id',$playerid );
            echo json_encode($player);
            exit();
        }
    }

?>