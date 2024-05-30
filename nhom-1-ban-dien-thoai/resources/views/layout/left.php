<style>
    .nav-item {
        position: relative;
        transition: background-color 0.3s ease;
        border-radius: 5px;
    }

    .nav-item:hover {
        background-color: #f8f9fa; /* Màu nền khi di chuột qua */
    }

    .submenu {
        visibility: hidden;
        position: absolute;
        left: 100%;
        top: 0;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Thêm bóng đổ */
        opacity: 0; /* Ẩn menu con ban đầu */
        transition: opacity 0.3s ease, visibility 0.3s ease;
        border-radius: 10px;
    }

    .nav-item:hover .submenu {
        opacity: 1;
        visibility: visible;
    }

    .submenu > li {
        width: 100%; /* Chiều rộng của các phần tử li bên trong submenu */
    }

    .submenu > li > a {
        display: block;
        padding: 8px 16px; /* Padding cho các phần tử a bên trong submenu */
        color: #333; /* Màu chữ cho các phần tử a bên trong submenu */
        text-decoration: none; /* Loại bỏ gạch chân cho các liên kết bên trong submenu */
        transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu nền khi hover */
    }

    .submenu > li > a:hover {
        background-color: aquamarine; /* Màu nền khi hover */
    }   
</style>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-8 col-xl-8 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 me-5">
                            <i class="fs-4 bi-house"></i> <span class="ms-3 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/public/getAccouts" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i>
                            <span class="ms-3 d-none d-sm-inline me-5">Accouts</span>
                        </a>
                        <ul class="nav flex-column submenu" id="submenu3">
                            <li class="w-100">
                                <a href="/public/insertAccout" class="nav-link px-0"> <span class="d-none d-sm-inline ms-1 me-3">Add</span> </a>
                            </li>
                            <li>
                                <a href="/public/getaccoutSearch" class="nav-link px-0"> <span class="d-none d-sm-inline ms-1 me-3">Search</span> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/public/getProducts" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i>
                            <span class="ms-3 d-none d-sm-inline me-5">Products</span>
                        </a>
                        <ul class="nav flex-column submenu" id="submenu3">
                            <li class="w-100">
                                <a href="/public/insertProduct" class="nav-link px-0"> <span class="d-none d-sm-inline ms-1 me-3">Add</span> </a>
                            </li>
                            <li>
                                <a href="/public/getproductsbyBand" class="nav-link px-0"> <span class="d-none d-sm-inline ms-1 me-3">Search</span> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/public/getInventories" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i>
                            <span class="ms-3 d-none d-sm-inline me-5">Inventory</span>
                        </a>
                        <ul class="nav flex-column submenu" id="submenu3">
                            <li class="w-100">
                                <a href="/public/insertInventory" class="nav-link px-0"> <span class="d-none d-sm-inline ms-1 me-3">Add</span> </a>
                            </li>
                            <li>
                                <a href="/public/getInventorySearch" class="nav-link px-0"> <span class="d-none d-sm-inline ms-1 me-3">Search</span> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/public/getBanners" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i>
                            <span class="ms-3 d-none d-sm-inline me-5">Banners</span>
                        </a>
                        <ul class="nav flex-column submenu" id="submenu3">
                            <li class="w-100">
                                <a href="/public/insertBanner" class="nav-link px-0"> <span class="d-none d-sm-inline ms-1 me-3">Add</span> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-3 d-none d-sm-inline me-4">Customers</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>