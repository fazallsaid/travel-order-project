<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustOrdersController extends Controller
{
    public function index(){
        if(session('customer') == true){
            $title = "Orders / Andhika Travel";
            $data = [
                'title' => $title,
            ];
            return view('customer.pages.orders.index', $data);
        }
    }
}
