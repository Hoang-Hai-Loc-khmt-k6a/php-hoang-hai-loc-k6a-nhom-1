<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Shop</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/Style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <header id="header">
        <div class="logo">
            <img src="/devlogo.png" alt="Dev Shop Logo">
            <h3>Dev Shop</h3>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="#">ĐIỆN THOẠI</a>
                    <ul class="submenu">
                    @foreach($companys as $company)
                        <li>
                            <a href="#">{{ $company->name }}</a>
                            <ul class="sub-submenu">
                            @foreach($bands as $band)
                            @if ($band->company == $company->name)
                                <li><a href="#">{{ $band->name }}</a></li>
                            @endif
                            @endforeach
                            </ul>
                        </li>
                    @endforeach
                    </ul>
                </li>
                <li><a href="#">PHỤ KIỆN</a>
                    <ul class="submenu">
                        <li><a href="#">Ốp lưng</a></li>
                        <li><a href="#">Miếng dán màn hình</a></li>
                        <li><a href="#">Sạc dự phòng</a></li>
                        <li><a href="#">Tai nghe</a></li>
                        <li><a href="#">Loa bluetooth</a></li>
                        <li><a href="#">Cáp sạc</a></li>
                        <li><a href="#">Pin điện thoại</a></li>
                        <li><a href="#">Gậy tự sướng</a></li>
                        <li><a href="#">Giá đỡ điện thoại</a></li>
                        <li><a href="#">Thẻ nhớ</a></li>
                        <li><a href="#">Đèn flash điện thoại</a></li>
                        <li><a href="#">Kính thực tế ảo (VR)</a></li>
                        <li><a href="#">Tay cầm chơi game</a></li>
                        <li><a href="#">Bộ chuyển đổi OTG</a></li>
                        <li><a href="#">Đồng hồ thông minh</a></li>
                        <li><a href="#">Bút cảm ứng</a></li>
                        <li><a href="#">Quạt tản nhiệt điện thoại</a></li>
                        <li><a href="#">Bộ vệ sinh điện thoại</a></li>
                        <li><a href="#">Pin sạc không dây</a></li>
                        <li><a href="#">Đế sạc không dây</a></li>
                    </ul>
                </li>
                <li><a href="#">SIM & THẺ NHỚ</a>
                    <ul class="submenu">
                        <li><a href="#">SIM 4G/5G</a></li>
                        <li><a href="#">Thẻ nhớ microSD</a></li>
                        <li><a href="#">Thẻ SIM đa năng</a></li>
                    </ul>
                </li>
                <li><a href="#">MÁY TÍNH BẢNG</a>
                    <ul class="submenu">
                        <li><a href="#">Máy tính bảng Apple</a></li>
                        <li><a href="#">Máy tính bảng Samsung</a></li>
                        <li><a href="#">Máy tính bảng Xiaomi</a></li>
                        <li><a href="#">Máy tính bảng Lenovo</a></li>
                        <li><a href="#">Máy tính bảng Huawei</a></li>
                        <li><a href="#">Máy tính bảng Asus</a></li>
                        <li><a href="#">Máy tính bảng Acer</a></li>
                    </ul>
                </li>
                <li><a href="#">MÁY CŨ GIÁ RẺ</a>
                    <ul class="submenu">
                        <li><a href="#">Điện thoại cũ</a></li>
                        <li><a href="#">Máy tính bảng cũ</a></li>
                        <li><a href="#">Phụ kiện cũ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Nhập tên điện thoại, máy tnh, phụ khiện... cần tìm">
            <button><i class="fas fa-search"></i></button>
            <div style="margin-left:20px">
                @if (session('fullname'))
                    <div class="dropdown">
                        <i class="fas fa-user"></i><a href="#" class="menu-link">{{ session('fullname') }}</a>
                        <div class="dropdown-content">
                            <a href="./profile">Profile</a>
                            <a href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                    <i class="fas fa-shopping-cart"></i><a href="./cart" class="menu-link">Giỏ hàng</a>
                @else
                    <i class="fas fa-user"></i><a href="./login" class="menu-link">Tài khoản</a>
                @endif
            </div>
        </div>
    </header>
    <main>
        @yield('detail')
        <!-- Banner -->
        <div class="banner-container">
            @foreach($banners as $banner)
                <div class="banner">
                    <a href="#" ><img src="{{ $banner->image_url }}" alt="{{ $banner->title }}"></a>
                </div>
            @endforeach
        </div>


        <div class="separator-container">
            <p class="separator-text" style="color:red">HOT SALE</p>
            <a href="hotsale" class="mostview-link">Xem Hot Sale</a>
        </div>

        <!-- Products -->
        <div class="hotsale-container">
            <button id="prevButton" class="navigation-button" onclick="moveSlide(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="hotsale-wrapper">
                <div class="hotsale">
                    @foreach($products->reverse() as $product)
                        @if($product->isHotSale())
                            <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="product-link">
                                <div class="product">
                                    <div class="discount">HOT</div>
                                    <img class="product-image" src="{{ $product->image }}" alt="{{ $product->pname }}">
                                    <p class="product-name">{{ $product->pname }}</p>
                                    <p class="price"><span class="old-price">{{ number_format($product->price, 0, ',', '.') }}<sup>đ</sup></span>&nbsp;&nbsp;{{ number_format($product->hotsale, 0, ',', '.') }} <sup>đ</sup></p>
                                    <button class="buy-button">MUA GIÁ SỐC</button>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            
            <button id="nextButton" class="navigation-button" onclick="moveSlide(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div class="separator-container">
            <p class="separator-text">Sản phẩm phổ biến</p>
            <a href="" class="mostview-link">Xem Sản Phẩm Phổ Biến</a>
        </div>

        <div class="mostview">
            @foreach($products->reverse() as $product)
                @if($product->isMostView())
                    <div class="product">
                        <img src="{{ $product->image }}" alt="{{ $product->pname }}">
                        <h2>{{ $product->pname }}</h2>
                        <p>{{ number_format($product->price, 0, ',', '.') }}<sup>đ</sup></p>
                        <button>Add to Cart</button>
                    </div>
                @endif
            @endforeach
        </div> 
    </main>

    <footer>
        <div class="fs-footer">
            <div class="f-wrap">
                <div class="fs-ftrow clearfix">
                    <div class="fs-ftcol fs-ftcol1">
                        <ul class="fs-ftul">
                            <li><a href="#">Giới thiệu về công ty</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Quy chế hoạt động</a></li>
                            <li><a href="#">Kiểm tra hóa đơn điện tử</a></li>
                            <li><a href="#">Tra cứu thông tin bảo hành</a></li>
                            <li><a href="#">Câu hỏi thường gặp mua hàng</a></li>
                        </ul>
                        <div class="ft-wrap">
                            <div class="ft-item">
                                <img class="cth1" src="/chungnhan1.png" />
                            </div>
                            <div class="ft-item">
                                <a href="#"><img class="cth2" src="/chungnhan2.png"></a>
                            </div>
                        </div>
                    </div>
                    <div class="fs-ftcol fs-ftcol1">
                        <ul class="fs-ftul">
                            <li><a href="#">Tin khuyến mãi</a></li>
                            <li><a href="#">Hướng dẫn mua online</a></li>
                            <li><a href="#">Hướng dẫn mua trả góp</a></li>
                            <li><a href="#">Chính sách trả góp</a></li>
                            <li><a href="#">Chính sách thu thập và <br />xử lý dữ liệu cá nhân</a></li>
                        </ul>
                        <p class="fs-ftrtit">Chứng nhận:</p>
                        <div class="ft-wrap">
                            <div class="ft-item">
                                <img class="dmca" src="/chungnhan3.png" />
                            </div>
                            <div class="ft-item">
                                <img class="dv" src="/chungnhan4.png" />
                            </div>
                            <div class="ft-item">
                                <img class="thvn" src="/chungnhan5.jpg" />
                            </div>
                        </div>
                    </div>
                    <div class="fs-ftcol fs-ftcol--custom">
                        <ul class="fs-ftr2 clearfix">
                            <li>
                                <p class="fs-ftrtit">Tư vấn mua hàng (Miễn phí)</p>
                                <a href="#">1800 0000<span>(Nhánh 1)</span></a>
                            </li>
                            <li class="desktop-only">
                                <p class="fs-ftrtit">Hỗ trợ kỹ thuật</p>
                                <a href="#">1800 0000 <span>(Nhánh 2)</span></a>
                            </li>
                            <li>
                                <p class="fs-ftrtit">Góp ý, khiếu nại (8h00 - 22h00)</p>
                                <a href="#">1800 0000</a>
                            </li>
                        </ul>
                        <div class="fs-ftr1">
                            <p class="fs-ftrtit">Hỗ trợ thanh toán:</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fs-ftbott">
                <p>
                    © 2023 - 2024 Shop Bán Lẻ Kỹ Thuật Số Dev / Địa chỉ: 123 Nam Khê, TP Uông Bí, Tỉnh Quảng Ninh / GPĐKKD số 398275743 do Sở KHĐT Tỉnh Quảng Ninh cấp ngày 08/03/2099. GP số 47/GP-TTĐT do sở TTTT Tỉnh Quảng Ninh cấp ngày 01/07/2099. Điện thoại: <a href="#">(0222) 1234 1234</a>. Email: <a href="#"><span class="__cf_email__" >[email&#160;protected]</span></a>. Chịu trách nhiệm nội dung: Hoàng Hải Lộc.
                </p>
            </div>
        </div>
    </footer>

    <script src="/resources/js/Script.js"></script>
    <script>
        var currentIndex = 0;
        var hotsales = document.querySelectorAll('.hotsale .product');

        function showSlides() {
            hotsales.forEach((product, index) => {
                product.style.display = (index >= currentIndex && index < currentIndex + 5) ? 'block' : 'none';
            });
        }

        function moveSlide(direction) {
            if (currentIndex + direction >= 0 && currentIndex + direction <= hotsales.length - 5) {
                currentIndex += direction;
                showSlides();
            }
        }

        document.addEventListener('DOMContentLoaded', showSlides);

    </script>
</body>
</html>
