<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AllGetDataController;

class AuthController extends Controller
{
    private $allGetDataController; // Declare AllGetDataController property

    // Constructor to initialize AllGetDataController
    public function __construct(AllGetDataController $allGetDataController) {
        $this->allGetDataController = $allGetDataController;
    }

    function regProcess(Request $request){
        $create = $this->allGetDataController->register($request);

        if($create){
            // Redirect to home page with loginModal open
            return redirect('/');
        }else{
            // Redirect to home page with registerModal open
            return redirect('/');
        }
    }
}
