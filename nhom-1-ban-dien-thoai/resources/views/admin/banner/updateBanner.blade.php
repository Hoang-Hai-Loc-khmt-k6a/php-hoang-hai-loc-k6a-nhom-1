@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Update {{ $accout->fullname }}</strong>
    </h1>
@endsection

@section('Content')
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="{{ url('updateAccout/' . $accout->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="{{ $accout->username }}" id="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Leave blank to keep current password">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $accout->email }}" id="email" required>
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname" value="{{ $accout->fullname }}" id="fullname">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $accout->phone }}" id="phone">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" value="{{ $accout->address }}" id="address">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select form-select-lg" name="role" id="role" required>
                <option value="admin" {{ $accout->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="customer" {{ $accout->role == 'customer' ? 'selected' : '' }}>Customer</option>
                <option value="staff" {{ $accout->role == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="btUpdate">Update</button>
    </form>
@endsection
