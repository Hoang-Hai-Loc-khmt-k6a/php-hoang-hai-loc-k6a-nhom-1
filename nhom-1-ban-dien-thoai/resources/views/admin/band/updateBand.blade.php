@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Update {{ $band->name }}</strong>
    </h1>
@endsection

@section('Content')
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="{{ url('updateBand/' . $band->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name Band</label>
            <input type="text" class="form-control" name="name" value="{{ $band->name }}" id="name" required>
        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <select class="form-select form-select-lg" name="company" id="company">
                <option value="{{ $band->company }}">{{ $band->company }}</option>
                @foreach($companys as $company)
                    <option value="{{ $company->name }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="btUpdate">Update</button>
    </form>
@endsection
