@extends('layout')
@section('title','Customer List')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="customers" method="POST" class="pb-5">
                <label for="name">Name</label>
                <div class="form-group pb-2">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    <div>{{ $errors->first('name') }}</div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                    <div>{{ $errors->first('email') }}</div>
                </div>

                <div class="form-group">
                    <select name="active" id="active">
                        <option value="" disabled>Select customer Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn-primary">Add Customer</button>

                @csrf
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <ul>
                @foreach ($customers as $customer)
                    <li>{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
