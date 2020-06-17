<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    //

    public function __construct()
    {
        // this is middleware defined by the construct of the class
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
//        $customers = [
//            'John Doe',
//            'Jane Doe',
//            'Bob The Builder',
//        ];
        $customers = Customer::all();
//        $activeCustomers = Customer::active()->get();
//        $inactiveCustomers = Customer::inactive()->get();
//        dd($activeCustomers);
//        dd($inactiveCustomers);
//        $customers = Customer::all();
//
//        dd($customers);
//
//        return view('internals.customers', [
//            'activeCustomers' => $activeCustomers,
//            'inactiveCustomers' => $inactiveCustomers
//        ]);

        return view('customers.index',
            compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create',compact('companies', 'customer'));
    }

    public function store()
    {

        $customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));


//        $customer = new Customer();
//        $customer->name = request('name');
//        $customer->email = request('email');
//        $customer->active = request('active');
//        $customer->save();
//        dd(request('name'));
        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        /*this line below can be supplemented in the function argument as Customer
        $customer = Customer::find($customer);
        dd($customer);*/
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer','companies'));
    }

    public function update(Customer $customer)
    {


        $customer->update($this->validateRequest());

        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers');
    }

    private function validateRequest()
    {
        return tap(request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]), function()
        {
            if(request()->hasFile('image'))
            {
                dd(\request()->image);
                request()->validate([
                    'image' => 'file|image|max:5120'
                ]);
            }
        });
/*
        $validatedData = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        if(request()->hasFile('image'))
        {
            dd(\request()->image);
            request()->validate([
                'image' => 'file|image|max:5120'
            ]);
        }

        return $validatedData;*/
    }

    private function storeImage($customer)
    {
        if(\request()->has('image'))
        {
            $customer->update([
                'image' => \request()->image
            ])
        }
    }
}
