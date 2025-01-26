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
        if(session('admin') == true){
            $title = "Customer / Andhika Travel";
            $adminid = session('adminid');
            $admin = $this->allGetDataController->getAdminByUser($adminid);
            $customer = $this->allGetDataController->getCustomers();
            $data = [
                'title' => $title,
                'customer' => $customer,
                'adm' => $admin,
            ];
            return view('admin.pages.customer.index', $data);
        }else{
            toastr()->error('Anda tidak memiliki akses untuk ke halaman tersebut tanpa login terlebih dahulu.');
            return redirect('/');
        }
    }
}
