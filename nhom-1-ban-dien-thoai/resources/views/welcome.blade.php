<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Shop</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/Style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

</head>
<body>
    <header id="header">
        <div class="logo">
            <img src="/devlogo.png" alt="Dev Shop Logo">
            <h3>Dev Shop</h3>
        </div>
        <nav>
            <ul>
                <li><a href="#">ĐIỆN THOẠI</a></li>
                <li>
                    <a href="#">LAPTOP</a>
                    <ul class="submenu">
                        <li><a href="#">Máy tính xách tay</a></li>
                        <li><a href="#">Máy tính để bàn</a></li>
                        <li>
                            <a href="#">Phụ kiện</a>
                            <ul class="sub-submenu">
                                <li><a href="#">Chuột máy tính</a></li>
                                <li><a href="#">Bàn phím</a></li>
                                <li><a href="#">Tai nghe</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">MÁY TÍNH BẢNG</a>
                    <ul class="submenu">
                        <li><a href="#">Máy tính xách tay</a></li>
                        <li><a href="#">Máy tính để bàn</a></li>
                        <li>
                            <a href="#">Phụ kiện</a>
                            <ul class="sub-submenu">
                                <li><a href="#">Chuột máy tính</a></li>
                                <li><a href="#">Bàn phím</a></li>
                                <li><a href="#">Tai nghe</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">PHỤ KIỆN</a>
                    <ul class="submenu">
                        <li><a href="#">Máy tính xách tay</a></li>
                        <li><a href="#">Máy tính để bàn</a></li>
                    </ul>
                </li>
                <li><a href="#">APPE</a></li>
                <li><a href="#">PC - LINH KIỆN</a></li>
                <li><a href="#">MÁY CŨ GIÁ RẺ</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Nhập tên điện thoại, máy tnh, phụ khiện... cần tìm">
            <button><i class="fas fa-search"></i></button>
            <div style="margin-left:20px">
                <i class="fas fa-user"></i><a href="#" class="menu-link">Tài khoản</a>
                <i class="fas fa-shopping-cart"></i><a href="#" class="menu-link">Giỏ hàng</a>
            </div>
        </div>
    </header>
    <main>
        <!-- Banner -->
        <div class="banner-container">
            @foreach($banners as $banner)
                <div class="banner">
                    <a href="#" ><img src="{{ $banner->image_url }}" alt="{{ $banner->title }}"></a>
                </div>
            @endforeach
        </div>
        <!-- Products -->
        <div class="products1">
            <div class="product">
                <div class="discount">HOT</div>
                <img class="product-image" src="/tivi.jpg" alt="Tivi Sony 4K">
                <p class="product-name">Tivi Sony 4K</p>
                <p class="price"><span class="old-price">$299</span> $199</p>
                <button class="buy-button">MUA GIÁ SỐC</button>
                <a class="product-link" href="#">Xem sản phẩm</a>
            </div>
            <div class="product">
                <div class="discount">HOT</div>
                <img class="product-image" src="/iphone15.jpg" alt="Iphone 15">
                <p class="product-name">Iphone 15</p>
                <p class="price"><span class="old-price">$199</span> $150</p>
                <button class="buy-button">MUA GIÁ SỐC</button>
                <a class="product-link" href="#">Xem sản phẩm</a>
            </div>
            <div class="product">
                <div class="discount">HOT</div>
                <img class="product-image" src="/samsung.jpg" alt="Samsung S24 Ultra">
                <p class="product-name">S24 Ultra</p>
                <p class="price"><span class="old-price">$279</span> $239</p>
                <button class="buy-button">MUA GIÁ SỐC</button>
                <a class="product-link" href="#">Xem sản phẩm</a>
            </div>
            <div class="product">
                <div class="discount">HOT</div>
                <img class="product-image" src="/airpods.jpg" alt="Tai nghe Airpods Pro 2 MagSafe (USB‐C)">
                <p class="product-name">Airpods Pro</p>
                <p class="price"><span class="old-price">$99</span> $69</p>
                <button class="buy-button">MUA GIÁ SỐC</button>
                <a class="product-link" href="#">Xem sản phẩm</a>
            </div>
            <div class="product">
                <div class="discount">HOT</div>
                <img class="product-image" src="/applewatch.jpg" alt="Đồng hồ Apple Watch SE (2023) GPS">
                <p class="product-name">Apple Watch SE</p>
                <p class="price"><span class="old-price">$88</span> $69</p>
                <button class="buy-button">MUA GIÁ SỐC</button>
                <a class="product-link" href="#">Xem sản phẩm</a>
            </div>
        </div>

        <div class="products2">
            <div class="product">
                <img src="/caymaytinh.jpg" alt="Cây máy tính">
                <h2>Cây máy tính</h2>
                <p>$19.99</p>
                <button>Add to Cart</button>
            </div>
            <div class="product">
                <img src="/maytinh.jpg" alt="Máy tính">
                <h2>Máy tính</h2>
                <p>$24.99</p>
                <button>Add to Cart</button>
            </div>
            <div class="product">
                <img src="/maytinhbang.jpg" alt="Máy tính bảng">
                <h2>Máy tính bảng</h2>
                <p>$29.99</p>
                <button>Add to Cart</button>
            </div>
            <div class="product">
                <img src="/chuot.jpg" alt="Chuột Razer DeathAdder V3 Pro Wireless - White">
                <h2>Chuột Razer V3 Pro</h2>
                <p>$29.99</p>
                <button>Add to Cart</button>
            </div>
            <div class="product">
                <img src="/case.jpg" alt="Core I5 12400F|Ram 16G| GTX 1660 Super 6G| NVME 250G">
                <h2>Case Core I5 12400F</h2>
                <p>$29.99</p>
                <button>Add to Cart</button>
            </div>
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

    <script src="/resources/js/Script.js">
        
    </script>
</body>
</html>
