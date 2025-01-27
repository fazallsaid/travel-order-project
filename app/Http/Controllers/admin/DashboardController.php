<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AllGetDataController;

class DashboardController extends Controller
{
    private $allGetDataController; // Declare AllGetDataController property

    // Constructor to initialize AllGetDataController
    public function __construct(AllGetDataController $allGetDataController) {
        $this->allGetDataController = $allGetDataController;
    }

    public function index(){
        $title = "Dashboard / Andhika Travel";
        if(session('admin') == true){
            $adminid = session('adminid');
            $admin = $this->allGetDataController->getAdminByUser($adminid);
            $customer = $this->allGetDataController->getCustomers();
            $orders = $this->allGetDataController->getOrders();
            $data = [
                'title' => $title,
                'adm' => $admin,
                'customer' => $customer,
                'orders' => $orders,
            ];
            return view('admin.dashboard', $data);
        }else{
            toastr()->error('Anda tidak memiliki akses untuk ke halaman tersebut tanpa login terlebih dahulu.');
            return redirect('/');
        }

    }
}
