<?php


function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

// dd($_SERVER["REQUEST_URI"]);

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
    // echo $_SERVER['REQUEST_URI'] === '/' ? 'bg-sky-800 text-white':'text-gray-900';
}



?>