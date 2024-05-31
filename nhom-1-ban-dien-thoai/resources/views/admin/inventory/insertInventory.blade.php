@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Add Inventory</strong>
    </h1>
@endsection

@section('Content')
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="{{ url('insertInventory') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3" style="display: grid; grid-template-columns: 1fr 1fr; grid-column-gap: 20px;">
            <div class="mb-3">
                <label for="productid" class="form-label">PID</label>
                <input type="text" class="form-control" id="productid" name="productid" readonly>
            </div>
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <select class="form-select form-select-lg" name="product_name" id="product_name">
                    @foreach($products as $product)
                        <option value="{{ $product->pname }}" data-id="{{ $product->id }}">{{ $product->pname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="quantity" required>
            </div>
            <div class="mb-3">
                <label for="minimum_quantity" class="form-label">Minimum Quantity</label>
                <input type="number" class="form-control" name="minimum_quantity" id="minimum_quantity">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="btInsert">
            Add
        </button>
    </form>
    <script>
        document.getElementById('product_name').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var productId = selectedOption.getAttribute('data-id');
            document.getElementById('productid').value = productId;
        });
    </script>
@endsection
