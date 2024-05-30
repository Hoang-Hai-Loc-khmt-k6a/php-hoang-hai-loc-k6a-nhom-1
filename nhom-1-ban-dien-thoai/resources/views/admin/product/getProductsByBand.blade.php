@extends('layout.master')
@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</str>
    </h1>
    <h1 class="mb-3">
        <strong>Search Product</strong>
    </h1>
@endsection
@section('Content')
<form method="get" action="{{ route('admin.product.getProductsByBand') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="mb-3 mt-3" style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-column-gap: 20px;">
        <div>
            <label for="company" class="form-label">Select Company</label>
            <select class="form-select form-select-lg" name="company" id="company">
                <option value="">All</option>
                @foreach($products as $product)
                    <option value="{{ $product->company }}">{{ $product->company }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="" class="form-label">Select Year</label>
            <select class="form-select form-select-lg" id="year" name="year">
                <option value="">All</option>
                @foreach($products as $product)
                    <option value="{{ $product->year }}">{{ $product->year }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="" class="form-label">Select Band</label>
            <select class="form-select form-select-lg" name="selectBand" id="">
                <option value="">All</option>
                @foreach($products as $product)
                    <option value="{{ $product->band }}">{{ $product->band }}</option>
                @endforeach
            </select>
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
            <th class="text-center">PID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Company</th>
            <th class="text-center">Year</th>
            <th class="text-center">Band</th>
            <th class="text-center">Image</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>             
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td class="text-left">{{ $product->pid }}</td>
            <td class="text-left">{{ $product->pname }}</td>
            <td class="text-left">{{ $product->company }}</td>   
            <td class="text-left">{{ $product->year }}</td>
            <td class="text-left">{{ $product->band }}</td>   
            <td class="text-left"><img src="{{ $product->image }}" alt="Image"></td>  
            <td class="center"><i class="fa fa-pencil fa-fw"></i>
                <a href="updateProduct/{{ $product->pid }}">Edit</a></td>
            <td class="center"><i class="fa fa-trash-o fa-fw"></i>
                <a href="deleteProduct/{{ $product->pid }}">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
