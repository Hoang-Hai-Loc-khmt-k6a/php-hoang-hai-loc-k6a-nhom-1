@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Account Management</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Get Accounts</strong>
    </h1>
@endsection

@section('Content')
@if (session('Note'))
    <div class="alert alert-success">
        {{ session('Note') }}
    </div>
@endif

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
        @foreach($accouts as $accout)
        <tr>
            <td class="text-left">{{ $accout->id }}</td>
            <td class="text-left">{{ $accout->username }}</td>
            <td class="text-left">{{ $accout->email }}</td>
            <td class="text-left">{{ $accout->fullname }}</td>
            <td class="text-left">{{ $accout->phone }}</td>
            <td class="text-left">{{ $accout->address }}</td>
            <td class="text-left">{{ $accout->role }}</td>
            <td class="text-center">
                <a href="{{ url('updateAccout/' . $accout->id) }}">
                    <i class="fa fa-pencil fa-fw"></i>Edit
                </a>
            </td>
            <td class="text-center">
                <a href="{{ url('deleteAccout/' . $accout->id) }}">
                    <i class="fa fa-trash-o fa-fw"></i>Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
