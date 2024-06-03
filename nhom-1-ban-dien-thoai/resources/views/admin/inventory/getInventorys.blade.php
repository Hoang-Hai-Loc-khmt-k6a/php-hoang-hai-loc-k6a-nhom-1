@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Inventory Management</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Get Inventory</strong>
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
            <th class="text-center">Product Name</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Minimum Quantity</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inventories->reverse() as $inventory)
        <tr>
            <td class="text-left">{{ $inventory->ProductID}}</td>
            <td class="text-left">{{ $inventory->proname }}</td>
            <td class="text-left">{{ $inventory->Quantity }}</td>
            <td class="text-left">{{ $inventory->MinimumQuantity }}</td>
            <td class="text-center">
                <a href="{{ url('updateInventory/' . $inventory->id) }}">
                    <i class="fa fa-pencil fa-fw"></i>Edit
                </a>
            </td>
            <td class="text-center">
                <a href="{{ url('deleteInventory/' . $inventory->id) }}">
                    <i class="fa fa-trash-o fa-fw"></i>Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
