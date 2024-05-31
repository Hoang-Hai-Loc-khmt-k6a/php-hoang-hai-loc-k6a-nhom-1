@extends('layout.master')
@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</str>
    </h1>
    <h1 class="mb-3">
        <strong>Get Product</strong>
    </h1>
@endsection
@section('Content')
@if (session('Note'))
        <div class="alert alert-scucess">
            {{ session('Note') }}
        </div>
    @endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">PID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Company</th>
            <th class="text-center">Year</th>
            <th class="text-center">Band</th>
            <th class="text-center">Price</th>
            <th class="text-center">Hot Sale</th>
            <th class="text-center">Image</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td class="text-left">{{ $product->pid }}</td>
            <td class="text-left">{{ $product->pname }}</td>
            <td class="text-left">{{ $product->company }}</td>
            <td class="text-left">{{ $product->year }}</td>
            <td class="text-left">{{ $product->band }}</td>
            <td class="text-left">{{ $product->price }}</td>
            <td class="text-left">{{ $product->hotsale }}</td>
            <td class="text-left">
                <img src="{{ $product->image }}" alt="Image" style="width: 70px;">
            </td>

            <td class="text-center">
                <a href="updateProduct/{{ $product->pid }}">
                    <i class="fa fa-pencil fa-fw"></i>Edit
                </a>
            </td>
            <td class="text-center">
                <a href="deleteProduct/{{ $product->pid }}">
                    <i class="fa fa-trash-o fa-fw"></i>Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
