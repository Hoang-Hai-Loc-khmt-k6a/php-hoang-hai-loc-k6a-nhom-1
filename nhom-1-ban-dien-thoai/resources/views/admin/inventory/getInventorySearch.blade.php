@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Search Inventory</strong>
    </h1>
@endsection

@section('Content')
<form method="get" action="{{ route('admin.inventory.getInventorySearch') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="mb-3 mt-3" style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-column-gap: 20px;">
        <div>
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter product name">
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
            <th class="text-center">Product Name</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Minimum Quantity</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>             
        </tr>
    </thead>
    <tbody>
        @foreach ($inventories as $inventory)
        <tr>
            <td class="text-left">{{ $inventory->ProductID }}</td>
            <td class="text-left">{{ $inventory->proname }}</td>
            <td class="text-left">{{ $inventory->Quantity }}</td>
            <td class="text-left">{{ $inventory->MinimumQuantity }}</td>
            <td class="text-center"><i class="fa fa-pencil fa-fw"></i>
                <a href="{{ url('updateInventory/' . $inventory->id) }}">Edit</a></td>
            <td class="text-center"><i class="fa fa-trash-o fa-fw"></i>
                <a href="{{ url('deleteInventory/' . $inventory->id) }}">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
