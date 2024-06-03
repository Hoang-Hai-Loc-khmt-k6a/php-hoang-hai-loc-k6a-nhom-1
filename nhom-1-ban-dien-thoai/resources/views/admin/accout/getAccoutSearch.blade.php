@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Search Account</strong>
    </h1>
@endsection

@section('Content')
<form method="get" action="{{ route('admin.accout.getAccoutSearch') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="mb-3 mt-3" style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-column-gap: 20px;">
        <div>
            <label for="role" class="form-label">Select Role</label>
            <select class="form-select form-select-lg" name="role" id="role">
                <option value="">All</option>
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
                <option value="staff">Staff</option>
            </select>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" name="btSearch">
            Submit
        </button>
    </div>
</form>  

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Username</th>
            <th class="text-center">Email</th>
            <th class="text-center">Full Name</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Address</th>
            <th class="text-center">Role</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>             
        </tr>
    </thead>
    <tbody>
        @foreach ($accouts->reverse() as $accout)
        <tr>
            <td class="text-left">{{ $accout->id }}</td>
            <td class="text-left">{{ $accout->username }}</td>
            <td class="text-left">{{ $accout->email }}</td>
            <td class="text-left">{{ $accout->fullname }}</td>
            <td class="text-left">{{ $accout->phone }}</td>
            <td class="text-left">{{ $accout->address }}</td>
            <td class="text-left">{{ $accout->role }}</td>
            <td class="text-center"><i class="fa fa-pencil fa-fw"></i>
                <a href="{{ url('updateAccout/' . $accout->id) }}">Edit</a></td>
            <td class="text-center"><i class="fa fa-trash-o fa-fw"></i>
                <a href="{{ url('deleteAccout/' . $accout->id) }}">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
