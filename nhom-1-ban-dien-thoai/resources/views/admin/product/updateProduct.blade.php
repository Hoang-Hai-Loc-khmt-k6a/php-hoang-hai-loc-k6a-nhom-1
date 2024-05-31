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
        <div class="mb-3" style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-column-gap: 20px;">
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
                        <option value="{{ $product->band }}">{{ $product->pname }}</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Year</label>
                <select class="form-select form-select-lg" name="year" id="year">
                <?php
                for($year=2015; $year<=2025; $year++){
                    echo '<option value="'.$year.'">'.$year.'</option>';
                }
                ?>
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
                <label for="imageUrl" class="form-label">Choose image</label>
                <input type="file" class="form-control" name="imageUrl" id="imageUrl" onchange="previewImage(event)">
            </div>
            <div class="mb-3">
                <img id="imagePreview" src="{{ asset($product->image) }}" alt="Image" style="width: 100px;">
            </div>
                
        </div>
        

        <button type="submit" class="btn btn-primary" name="btUpdate">
            Update
        </button>
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
        
        function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
@endsection