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
                <input type="text" class="form-control" name="pid" id="pid" value="{{ $product->pid }}" />
            </div>
            <div class="mb-3">
                <label for="pname" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="pname" id="pname" value="{{ $product->pname }}"/>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <select class="form-select form-select-lg" name="company" id="company">
                    <option value="{{ $product->company }}">{{ $product->company }}</option>
                    @foreach($companys as $company)
                        <option value="{{ $company->name }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                    <label for="band" class="form-label">Band</label>
                    <select class="form-select form-select-lg" name="band" id="band">
                        <option value="{{ $product->band }}">{{ $product->band }}</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Year</label>
                <select class="form-select form-select-lg" name="year" id="year">
                    <option value="{{ $product->year }}">{{ $product->year }}</option>
                    <?php
                    for($year=2015; $year<=2025; $year++){
                        echo '<option value="'.$year.'">'.$year.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="price" id="price" value="{{ $product->price /1000}}"/>
                    <div class="input-group-append">
                        <span class="input-group-text">.000 VND</span>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="hotsale" class="form-label">Hot Sale</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="hotsale" id="hotsale" value="{{ $product->hotsale /1000}}" />
                    <div class="input-group-append">
                        <span class="input-group-text">.000 VND</span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="imageUrl" class="form-label">Choose image</label>
                <input type="hidden" name="oldImageUrl" id="oldImageUrl" value="{{ $product->image }}">
                <input type="file" class="form-control" name="imageUrl" id="imageUrl" onchange="updateOldImage(event)">
            </div>
            <div class="mb-3">
                <label for="mostview" class="form-label">Most View</label>
                <div class="form-control center-input" style="text-align: center;">
                    <label for="mostview" class="checkbox-label">
                        <input type="checkbox" name="mostview" id="mostview" {{ $product->mostview ? 'checked' : '' }} />
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="description" id="description" class="form-control" style="height: 200px;" placeholder="Mô tả sản phẩm" onfocus="if(this.placeholder === 'Mô tả sản phẩm') {this.placeholder = '';}" onblur="if(this.placeholder === '') {this.placeholder = 'Mô tả sản phẩm';}" ></textarea>
            </div>
            <div class="mb-3" style="text-align: center;">
                <img id="imagePreview" src="{{ asset($product->image) }}" alt="Image" style="width: 150px; display: inline-block; margin-top: 30px;">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="btUpdate">
            Update
        </button>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bands = {!! json_encode($bands) !!};
            const selectCompany = document.getElementById('company');
            const selectBand = document.getElementById('band');
            const fileInput = document.getElementById('imageUrl');
            const oldImageUrl = document.getElementById('oldImageUrl');
            const imagePreview = document.getElementById('imagePreview');

            selectCompany.addEventListener('change', function() {
                const company = this.value;
                updateBandOptions(company);
            });

            selectBand.addEventListener('change', function() {
                const bandName = this.value;
                if (bandName === '') {
                    updateBandOptions(); // If "Select Band" is selected, update with full band list
                } else {
                    updateCompanyOption(bandName);
                }
            });

            fileInput.addEventListener('change', updateOldImage);

            function updateBandOptions(company) {
                selectBand.innerHTML = ''; // Clear all options

                // Ensure the empty option is always present
                const emptyOption = document.createElement('option');
                emptyOption.value = '';
                emptyOption.textContent = '-- Select Band --';
                selectBand.appendChild(emptyOption);

                // Populate band options
                const filteredBands = company ? bands.filter(band => band.company === company) : bands;
                filteredBands.forEach(band => {
                    const option = document.createElement('option');
                    option.value = band.name;
                    option.textContent = band.name;
                    selectBand.appendChild(option);
                });
            }

            function updateCompanyOption(bandName) {
                const selectedBand = bands.find(band => band.name === bandName);

                // Ensure the empty option is always present
                if (!selectCompany.querySelector('option[value=""]')) {
                    const emptyOption = document.createElement('option');
                    emptyOption.value = '';
                    emptyOption.textContent = '-- Select Company --';
                    selectCompany.insertBefore(emptyOption, selectCompany.firstChild);
                }

                selectCompany.value = selectedBand ? selectedBand.company : '';
            }

            function updateOldImage(event) {
                if (event.target.files.length > 0) {
                    const file = event.target.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        oldImageUrl.value = e.target.result;
                    };

                    reader.readAsDataURL(file);
                }
            }
        });
 
        document.addEventListener('DOMContentLoaded', function() {
            const bands = {!! json_encode($bands) !!};
            const insertBand = document.getElementById('band');
            const productNameInput = document.getElementById('pname');

            insertBand.addEventListener('change', function() {
                const bandName = this.value;
                updateProductName(bandName);
            });

            function updateProductName(bandName) {
                productNameInput.value = bandName;
            }
        });
    </script>

@endsection