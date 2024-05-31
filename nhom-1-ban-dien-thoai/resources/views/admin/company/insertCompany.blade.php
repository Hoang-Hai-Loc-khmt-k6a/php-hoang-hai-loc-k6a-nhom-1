@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Add Company</strong>
    </h1>
@endsection

@section('Content')
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="{{ url('insertCompany') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3" style="display: grid; grid-template-columns: 1fr 1fr; grid-column-gap: 20px;">
            <div class="mb-3">
                <label for="name" class="form-label">Name Company</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="btInsert">
            Add
        </button>
    </form>
@endsection
