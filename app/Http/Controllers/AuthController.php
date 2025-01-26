<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    function logProcess(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $logIn = Users::where('email', $validatedData['email'])->first();

            if($logIn && Hash::check($validatedData['password'], $logIn->password)){
                if($logIn->role == 1){
                    $request->session()->put('admin', true);
                    $request->session()->put('adminid', $logIn->user_id);
                    return redirect('admin');
                }else{
                    $request->session()->put('customer', true);
                    $request->session()->put('customerid', $logIn->user_id);
                    return redirect('customer');
                }
            }else{
                toastr()->error('Email atau password salah.');
                return redirect('/');
            }
    }

    function logoutProcess(){
        $logout = $this->allGetDataController->logout();

        if($logout){
            // Redirect to home page
            toastr()->success('Anda berhasil logout.');
            return redirect('/');
        }else{
            // Redirect to home page
            toastr()->error('Anda gagal logout.');
            return redirect()->back();
        }
    }
}
