<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AllGetDataController;

class CustScheduleController extends Controller
{
    private $allGetDataController; // Declare AllGetDataController property

    // Constructor to initialize AllGetDataController
    public function __construct(AllGetDataController $allGetDataController) {
        $this->allGetDataController = $allGetDataController;
    }

    public function index(){
        if(session('customer') == true){
            $title = "Schedule / Andhika Travel";
            $cust = $this->allGetDataController->getCustomerByUser(session('customerid'));
            $schedules = $this->allGetDataController->getSchedules();
            $data = [
                'title' => $title,
                'cust' => $cust,
                'schedules' => $schedules,
            ];
            return view('customer.pages.schedule.index', $data);
        }
    }
}
