<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AllGetDataController;

class CustomerController extends Controller
{
    private $allGetDataController; // Declare AllGetDataController property

    // Constructor to initialize AllGetDataController
    public function __construct(AllGetDataController $allGetDataController) {
        $this->allGetDataController = $allGetDataController;
    }

    public function index(){
        $title = "Customer / Andhika Travel";
        $data = [
            'title' => $title,
        ];
        return view('admin.pages.customer.index', $data);
    }
}
