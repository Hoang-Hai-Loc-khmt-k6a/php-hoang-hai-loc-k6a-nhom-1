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
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="" method="POST" enctype="multipart/form-data">
        <button type="submit" class="btn btn-primary" name="btInsert">
            Insert
        </button>
        <div class="mb-3 mt-3" style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-column-gap: 20px;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="mb-3">
                <label for="pid" class="form-label">ID Product</label>
                <input type="text" class="form-control" name="pid" id="pid" placeholder="ID sản phẩm" onfocus="if(this.placeholder === 'ID sản phẩm') {this.placeholder = '';}" onblur="if(this.placeholder === '') {this.placeholder = 'ID sản phẩm';}"/>
            </div>
            <div class="mb-3">
                <label for="band" class="form-label">Band</label>
                <select class="form-select form-select-lg" name="band" id="band">
                    <option value="">-- Select Band --</option>
                    @foreach($bands as $band)
                        <option value="{{ $band->name }}">{{ $band->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="hotsale" class="form-label">Hot Sale</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="hotsale" id="hotsale" oninput="formatCurrency(this)"/>
                    <div class="input-group-append">
                        <span class="input-group-text">.000 VND</span>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="pname" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="pname" id="pname" placeholder="Tên sản phẩm" onfocus="if(this.placeholder === 'Tên sản phẩm') {this.placeholder = '';}" onblur="if(this.placeholder === '') {this.placeholder = 'Tên sản phẩm';}" />
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
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="price" id="price" oninput="formatCurrency(this)"/>
                    <div class="input-group-append">
                        <span class="input-group-text">.000 VND</span>
                    </div>
                </div>
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
                <input type="file" class="form-control" name="imageUrl" id="imageUrl" onchange="updateOldImage(event)">
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
            <div class="mb-3"></div>
            <div class="mb-3" id="imagePreviewContainer" style="display: none;">
                <img id="imagePreview" src="" alt="Image" style="width: 100px;">
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bands = {!! json_encode($bands) !!};
            const selectCompany = document.getElementById('company');
            const selectBand = document.getElementById('band');

            selectCompany.addEventListener('change', function() {
                const company = this.value;
                updateBandOptions(company);
            });

            selectBand.addEventListener('change', function() {
                const bandName = this.value;
                updateCompanyOption(bandName);
            });

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

        function updateOldImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');

            if (event.target.files.length > 0) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.style.display = 'block'; // Hiển thị thẻ container khi có tệp được chọn
                    oldImageUrl.value = e.target.result;
                };

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = ''; // Đặt src của hình ảnh thành rỗng nếu không có tệp được chọn
                imagePreviewContainer.style.display = 'none'; // Ẩn thẻ container khi không có tệp được chọn
            }
        }
    </script>

@endsection
