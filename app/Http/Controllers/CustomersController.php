<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Cassandra\Custom;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $companies = Company::all();

        return view('customers.index', compact('activeCustomers','inactiveCustomers','companies'));
    }

    public function create(){
        return view('customers.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);
        Customer::create($data);
        return back();
    }
}
