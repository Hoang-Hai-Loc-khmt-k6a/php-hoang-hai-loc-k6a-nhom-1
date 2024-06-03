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
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .product-detail {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            flex: 1 1 40%;
            margin-right: 20px;
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
            color: red;
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
    </style>
</head>
<body>
    @extends('welcome')
    @section('detail')
    <div class="container">
        <div class="product-detail">
            <div class="product-image">
                <img src="../{{ $product->image }}" alt="{{ $product->pname }}">
            </div>
            <div class="product-info">
                <h1>{{ $product->pname }}</h1>
                <p class="price">
                    <span class="old-price">{{ number_format($product->price, 0, ',', '.') }}<sup>đ</sup></span>&nbsp;&nbsp;
                    {{ number_format($product->hotsale, 0, ',', '.') }} <sup>đ</sup>
                </p>
                <p>{{ $product->description }}</p>
                <button class="buy-button">Thêm vào giỏ</button>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
