<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// manual way of routing
// if ($uri === '/') {
//     require 'controllers/index.php';
// }else if($uri === '/about'){
//     require 'controllers/about.php';
// }

// programming way of routing
$routes = [
    '/' => 'controllers/index.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];


function routeToController($uri,$routes){
    if (array_key_exists($uri,$routes)) {
        require $routes[$uri];
    }else{
        abort(404);
    }    
}

function abort($status_code=404){
    http_response_code($status_code);
    // echo "Sorry, Not found!";
    // require "views/404.php";
    require "views/{$status_code}.php";
    die();
}

routeToController($uri,$routes);

?>