@extends('layout.master');
@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</str>
    </h1>
    <h1 class="mb-3">
        <strong>Update {{$product->pname}}</strong>
    </h1>
@endsection
@section('Content')
    @if (session('Note'))
        <div class="alert alert-scucess">
            {{ session('Note') }}
        </div>
    @endif

    <form action="{{$product->pid}}" method="POST" enctype="multipart/form-data">
        <input class="hidden" name="_token" value="{{ csrf_token() }}" style="display: none;"/>
        <div class="mb-3">
            <label for="" class="from-label">ID Product</label>
            <input type="text" class="from-control" name="pid" value="{{ $product->pid }}" id=""/>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">Product Name</label>
            <input type="text" class="from-control" name="pname" value="{{ $product->pname }}" id=""/>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">Company</label>
            <input type="text" class="from-control" name="company" value="{{ $product->company }}" id=""/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Select Band</label>
                    <select class="form-select form-select-lg" name="selectBand" id="">
                    <option value="Assured Night time Cold and Cough">Assured Night time Cold and Cough</option>
                    <option value="AeroGreen Antibac">AeroGreen Antibac</option>
                    <option value="Bodycology">Bodycology</option>
                    <option value="Ibuprofen">Ibuprofen</option>
                    </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Select Year</label>
            <select class="form-select form-select-lg" name="selectYear" id="">
            <?php
            for($year=2015; $year<=2025; $year++){
                echo '<option value="'.$year.'">'.$year.'</option>';
            }
            ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="imageUrl" class="form-label">Choose image</label>
            <img src="../{{ $product->image }}" alt="Image" style="width: 100px;">
            <input type="file" class="form-control" name="imageUrl" id="imageUrl">
        </div>

        <button type="submit" class="btn btn-primary" name="btUpdate">
            Update
        </button>

@endsection