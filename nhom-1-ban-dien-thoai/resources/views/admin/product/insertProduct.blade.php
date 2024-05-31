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
    <style>
        .center-input {
            display: flex;
            justify-content: center; 
            align-items: center;
            height: 40px;
            cursor: pointer;
        }

        .checkbox-label {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 400px;
            height: 40px;
            cursor: pointer;
        }

        .checkbox-label input[type="checkbox"] {
            width: 20px;
            height: 20px;
            transform: scale(1.5);
            cursor: pointer;
        }

    </style>
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3" style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-column-gap: 20px;">
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
                <select class="form-select form-select-lg" name="company" id="company">
                    <option value="">-- Select Company --</option>
                    @foreach($companys as $company)
                        <option value="{{ $company->name }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="band" class="form-label">Band</label>
                <select class="form-select form-select-lg" name="band" id="band">
                    <option value="">-- Select Company --</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <select class="form-select form-select-lg" name="year" id="year">
                    <option value="">-- Select Company --</option>
                    @for ($year = 2015; $year <= 2025; $year++)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" />
            </div>
            <div class="mb-3">
                <label for="hotsale" class="form-label">Hot Sale</label>
                <input type="number" class="form-control" name="hotsale" id="hotsale" />
            </div>
            <div class="mb-3">
                <label for="mostview" class="form-label">Most View</label>
                <div class="form-control center-input" style="text-align: center;">
                    <label for="mostview" class="checkbox-label">
                        <input type="checkbox" name="mostview" id="mostview" />
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="imageUrl" class="form-label">Choose image</label>
                <input type="file" class="form-control" name="imageUrl" id="imageUrl">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="btInsert">
            Insert
        </button>
    </form>
    <script>
    document.getElementById('company').addEventListener('change', function() {
        var company = this.value;
        var bands = {!! $bands !!};
        var filteredBands = bands.filter(function(band) {
            return band.company === company;
        });
        var selectBand = document.getElementById('band');
        selectBand.innerHTML = '';
        filteredBands.forEach(function(band) {
            var option = document.createElement('option');
            option.value = band.name;
            option.textContent = band.name;
            selectBand.appendChild(option);
        });
    });
    </script>
@endsection
