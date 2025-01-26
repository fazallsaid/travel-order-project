<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AllGetDataController;

class CustDashboardController extends Controller
{
    private $allGetDataController; // Declare AllGetDataController property

    // Constructor to initialize AllGetDataController
    public function __construct(AllGetDataController $allGetDataController) {
        $this->allGetDataController = $allGetDataController;
    }

    public function index(){
        if(session('customer') == true){
            $title = "Dashboard / Andhika Travel";
            $cust = $this->allGetDataController->getCustomerByUser(session('customerid'));
            $orders = $this->allGetDataController->getOrdersByUser();
            $data = [
                'title' => $title,
                'orders' => $orders,
                'cust' => $cust,
            ];
            return view('customer.dashboard', $data);
        }
    }
}
