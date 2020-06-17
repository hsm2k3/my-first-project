@extends('layouts.app')
@section('title', 'Add New Customer')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add New Customer</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST" class="pb-5 " enctype="multipart/form-data">
                @include('customers.form')
                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>
    {{--<hr>
    <div class="row">
        <div class="col-6">
            <h3>Active Customers:</h3>
            <ul>
                @foreach ($activeCustomers as $activeCustomer)
                    <li>{{$activeCustomer->name}}
                        <span class="text-muted">{{$activeCustomer->company->name}}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h3>Inactive Customers:</h3>
            <ul>
                @foreach ($inactiveCustomers as $inactiveCustomer)
                    <li>{{$inactiveCustomer->name}}
                        <span class="text-muted">{{$inactiveCustomer->company->name}}</span></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @foreach($companies as $company)
                <h3>{{$company->name}}</h3>
                <ul>
                    @foreach($company->customers as $customer)
                        <li>{{$customer->name}}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>--}}
@endsection
