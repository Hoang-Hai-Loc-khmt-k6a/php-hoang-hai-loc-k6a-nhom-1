<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 1000px;
            margin: 60px;
            padding: 40px;
        }

        .product-detail {
            min-height: 500px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            flex: 1 1 40%;
            margin-right: 20px;
            margin-top: 70px;
        }

        .product-image img {
            width: 100%;
            border-radius: 10px;
        }

        .product-info {
            flex: 1 1 50%;
        }

        .product-info h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .price {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .old-price {
            font-size: 16px;
            text-decoration: line-through;
            color: grey;
        }

        .product-info p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .buy-button {
            padding: 10px 20px;
            background-color: #ff4500;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buy-button:hover {
            background-color: #cc3700;
        }
        .product-image {
            width: 50px; 
            height: 150px; 
        }

        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain; 
        }
        
        .product-details {
            display: flex;
        }

        .column {
            flex: 1;
            border: 1px solid #ccc; 
            display: flex; 
            flex-direction: column; 
        }

        .detail {
            padding: 5px; 
            border-bottom: 1px solid #ccc; 
            display: flex; 
            flex: 1; 
        }


        .label {
            font-weight: bold;
        }

        .value {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    @extends('welcome')
    @section('detail')
    <div class="container">
        <div class="product-detail">
            <div class="product-image">
                <img src="/public/{{ $product->image }}" alt="{{ $product->pname }}" >
                <h1>{{ $product->pname }}</h1>
                <p class="price">
                    Giá: 
                    <span class="old-price">{{ number_format($product->price, 0, ',', '.') }}<sup>đ</sup></span>&nbsp;&nbsp;→&nbsp;&nbsp;
                    <span class="price" style="color: red;">{{ number_format($product->hotsale, 0, ',', '.') }} <sup>đ</sup></span>
                </p>
                <button class="buy-button" style="display: block; margin: 50px auto; ">Thêm vào giỏ</button>
            </div>
            <div class="product-info">
                <div class="product-details">
                    @php
                        $details = explode("\n", $product->description);
                    @endphp
                    <div class="column" style="max-width: 130px;">
                        @foreach($details as $detail)
                            @php
                                $parts = explode(':', $detail);
                            @endphp
                            <div class="detail">
                                <span class="label" style="height:60px"><b>{{ $parts[0] }}</b>:</span>
                            </div>
                        @endforeach
                    </div>
                        
                    <div class="column">
                        @php
                            $details = explode("\n", $product->description);
                        @endphp
                        @if(!empty($details))
                            @foreach($details as $detail)
                                @php
                                    $parts = explode(':', $detail);
                                @endphp
                                <div class="detail">
                                    @if(isset($parts[1]))
                                        <span class="value">{{ $parts[1] }}</span>
                                    @else
                                        <span class="value">N/A</span>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="detail">
                                <span class="value">N/A</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var secondColumnHeight = $('.column:last-child').outerHeight();
        $('.column:first-child').css('height', secondColumnHeight + 'px');
    });
</script>


    @endsection
</body>
</html>
