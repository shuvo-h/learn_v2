<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        return view('car_pages.car_page',[
            "user_name" => "Hrishab",
            "surname" => "Velko",
            "hobbies" => ["reading","playing","gaming"]
        ]);
    }

    public function runCarMethod(){
        return "Index method from Car controller";
    }
    public function getCarsMethod(){
        return "Here List of Cars";
    }
}
