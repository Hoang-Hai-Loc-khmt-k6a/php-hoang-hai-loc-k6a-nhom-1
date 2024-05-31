@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Update {{ $company->name }}</strong>
    </h1>
@endsection

@section('Content')
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="{{ url('updateCompany/' . $company->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name Company</label>
            <input type="text" class="form-control" name="name" value="{{ $company->name }}" id="name" required>
        </div>
        <button type="submit" class="btn btn-primary" name="btUpdate">Update</button>
    </form>
@endsection
