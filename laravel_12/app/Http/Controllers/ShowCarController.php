<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowCarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        return "I am automatically called by invocked";
    }
}
