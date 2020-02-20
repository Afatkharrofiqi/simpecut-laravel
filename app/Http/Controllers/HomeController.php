<?php

namespace App\Http\Controllers;

use App\Akun;
use App\Customer;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // contoh union dengan eloquent
    public function union(){
        $customer = Customer::select('*')->where('postal_code', 60881);
        $supplier = Supplier::select('*')->where('postal_code', 60881)->union($customer)->get();;

        return $supplier;
    }

    // contoh relasi dengan character
    public function uuid($id){
        $akun = Akun::where('customer_id', $id)->first();
        return $akun->customer;
    }

    public function storeProcedureInsert(){
        DB::select('call insert_user(?, ?, ?)',[
            'alan',
            'alan@gmail.com',
            'password'
        ]);
        return "done";
    }

    public function storeProcedureGet($id){
        return DB::select('call select_by_user_id(?)',[
            $id
        ]);
    }
}
