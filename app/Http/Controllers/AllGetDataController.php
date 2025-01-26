<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Orders;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

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
        dd($logIn);

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

    function logout(){
        session()->forget('admin');
        session()->forget('adminid');
        session()->forget('customer');
        session()->forget('customerid');
        return redirect('/');
    }

    function getAdminByUser($users){
        $admin = Users::where('user_id', $users)->first();
        return $admin;
    }

    function getCustomerByUser($users){
        $customer = Users::where('user_id', $users)->first();
        return $customer;
    }

    function getOrders(){
        $orders = Orders::all();
        return $orders;
    }

    function getOrdersByUser(){
        $orders = Orders::where('user_id', session('customerid'))->get();
        return $orders;
    }

    function createOrders(Request $request){
        $validatedData = $request->validate([
            'user_id' => 'required',
            'schedule_id' => 'required',
            'order_date' => 'required',
            'order_time' => 'required',
            'order_status' => 'required'
        ]);

        $order_code = "ANDHI".rand(1000,9999);
        $orders = new Orders;
        $orders->order_code = $order_code;
        $orders->user_id = $validatedData['user_id'];
        $orders->schedule_id = $validatedData['schedule_id'];
        $orders->order_date = $validatedData['order_date'];
        $orders->order_time = $validatedData['order_time'];
        $orders->order_status = $validatedData['order_status'];
        $orders->save();
        return $orders;
    }

    function updateOrderStatus($order_code, $order_status){
        $order = Orders::where('order_code', $order_code)->first();
        $order->order_status = $order_status;
        $order->save();
        return $order;
    }

    function getCustomers(){
        $cust = Users::where('role', '2')->get();
        return $cust;
    }

    function getSchedules(){
        $schedules = Schedule::all();
        return $schedules;
    }

    function createSchedules(Request $request){
        $validatedData = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'departure_time' => 'required',
            'ticket_price' => 'required'
        ]);

        $sched = Schedule::create($validatedData);
        return $sched;
    }

    function updateSchedules(Request $request){
        $validatedData = $request->validate([
            'schedule_id' => 'required',
            'from' => 'required',
            'to' => 'required',
            'departure_time' => 'required',
            'ticket_price' => 'required'
        ]);
        $sched = Schedule::find($validatedData['schedule_id']);
        $sched->from = $validatedData['from'];
        $sched->to = $validatedData['to'];
        $sched->departure_time = $validatedData['departure_time'];
        $sched->ticket_price = $validatedData['ticket_price'];
        $sched->save();
        return $sched;
    }

    function deleteSchedules(Request $request){
        $validatedData = $request->validate([
            'schedule_id' => 'required'
        ]);
        $sched = Schedule::find($validatedData['schedule_id']);
        $sched->delete();
        return $sched;
    }
}
