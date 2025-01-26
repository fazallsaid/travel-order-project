<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AllGetDataController extends Controller
{
    function register(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'whatsapp' => 'required',
            'role' => 'required',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $buatAkun = Users::create($validatedData);

        return $buatAkun;
    }

    function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $logIn = Users::where('email', $validatedData['email'])->first();

            if($logIn && Hash::check($validatedData['password'], $logIn->password)){
                if($logIn->role == "1"){
                    $request->session()->put('admin', true);
                    $request->session()->put('adminid', $logIn->user_id);
                }else{
                    $request->session()->put('customer', true);
                    $request->session()->put('customerid', $logIn->user_id);
                }
                return $logIn;
            }else{
                return null;
            }
    }

    function getAdmin($users){
        $admin = Users::where('user_id', $users)->first();
        return $admin;
    }
}
