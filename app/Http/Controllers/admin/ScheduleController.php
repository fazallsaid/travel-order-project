<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AllGetDataController;

class ScheduleController extends Controller
{
    private $allGetDataController; // Declare AllGetDataController property

    // Constructor to initialize AllGetDataController
    public function __construct(AllGetDataController $allGetDataController) {
        $this->allGetDataController = $allGetDataController;
    }

    public function index(){
        if(session('admin') == true){
            $title = "Schedule / Andhika Travel";
            $adminid = session('adminid');
            $admin = $this->allGetDataController->getAdminByUser($adminid);
            $schedules = $this->allGetDataController->getSchedules();
            $data = [
                'title' => $title,
                'schedules' => $schedules,
                'adm' => $admin,
            ];
            return view('admin.pages.schedule.index', $data);
        }else{
            toastr()->error('Anda tidak memiliki akses untuk ke halaman tersebut tanpa login terlebih dahulu.');
            return redirect('/');
        }
    }

    function create(Request $request){
        $create = $this->allGetDataController->createSchedules($request);
        if($create){
            toastr()->success('Jadwal berhasil ditambahkan.');
            return redirect('admin/schedule');
        }else{
            toastr()->error('Jadwal gagal ditambahkan.');
            return redirect('admin/schedule');
        }
    }
}
