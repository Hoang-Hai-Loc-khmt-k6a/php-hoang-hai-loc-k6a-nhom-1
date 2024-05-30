@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Update Inventory {{ $inventory->proname }}</strong>
    </h1>
@endsection

@section('Content')
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="{{ url('updateInventory/' . $inventory->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <select class="form-select form-select-lg" name="product_name" id="product_name">
                <option value="{{ $inventory->proname }}">{{ $inventory->proname }}</option>
                @foreach($products as $product)
                    <option value="{{ $product->pname }}">{{ $product->pname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" value="{{ $inventory->Quantity }}" id="quantity" required>
        </div>
        <div class="mb-3">
            <label for="minimum_quantity" class="form-label">Minimum Quantity</label>
            <input type="number" class="form-control" name="minimum_quantity" value="{{ $inventory->MinimumQuantity }}" id="minimum_quantity">
        </div>
        <button type="submit" class="btn btn-primary" name="btUpdate">Update</button>
    </form>
@endsection
