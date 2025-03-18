<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ShowCarController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    $person = [
        "name" =>"Zamti",
        "email" => "ab@mail.lcom"
    ];
    dump($person);
    return view('welcome');
});


Route::get('/about',function(){
    return view('about');
});

Route::get('/product/{product_id}',function($product_id){
    return "Product id is = {$product_id }";
});

// ('/url',[controller::class,'function name'])
// Route::get('/car',[App\Http\Controllers\CarController::class,'runCarMethod']);
// Route::get('/car',[CarController::class,'runCarMethod']);

// Regulare controller:  insted of making separate route for each method of a controller, make them in a group, then dont need to repetedly include the carcontroller
Route::controller(CarController::class)->group(function(){
    Route::get('/car','runCarMethod');   // route path & method name only
    Route::get('/cars','getCarsMethod');
});


// Invokable Controller 
Route::get('/show_cars',ShowCarController::class);

// resource abgle controller
Route::resource('/products',ProductController::class);
    // ->except(['destroy'])
    // ->only(['']);

// create api from resource based methods: index,create,store,show,edit,update,destroy
Route::apiResources([
    'v1/cars' => CarController::class,
    'v4/products' => ProductController::class,
]);

