@extends('layout.master')
@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</str>
    </h1>
    <h1 class="mb-3">
        <strong>Add Product</strong>
    </h1>
@endsection
@section('Content')
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="mb-3">
            <label for="pid" class="form-label">ID Product</label>
            <input type="text" class="form-control" name="pid" id="pid" />
        </div>
        <div class="mb-3">
            <label for="pname" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="pname" id="pname" />
        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <input type="text" class="form-control" name="company" id="company" />
        </div>
        <div class="mb-3">
            <label for="selectBand" class="form-label">Select Band</label>
            <select class="form-select form-select-lg" name="selectBand" id="selectBand">
                <option value="Assured Night time Cold and Cough">Assured Night time Cold and Cough</option>
                <option value="AeroGreen Antibac">AeroGreen Antibac</option>
                <option value="Bodycology">Bodycology</option>
                <option value="Ibuprofen">Ibuprofen</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="selectYear" class="form-label">Select Year</label>
            <select class="form-select form-select-lg" name="selectYear" id="selectYear">
                @for ($year = 2015; $year <= 2025; $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label for="imageUrl" class="form-label">Choose image</label>
            <input type="file" class="form-control" name="imageUrl" id="imageUrl">
        </div>
        <button type="submit" class="btn btn-primary" name="btInsert">
            Insert
        </button>
    </form>
@endsection
