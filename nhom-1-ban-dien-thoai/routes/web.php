<?php

use Illuminate\Support\Facades\Route;
use App\Models\BannerModel;
use App\Models\CompanyModel;
use App\Models\BandModel;
use App\Models\ProductModel;

Route::get('/', function () {
    $banners = BannerModel::all();
    $companys = CompanyModel::all();
    $bands = BandModel::all();
    $products = ProductModel::all();
    
    return view('welcome', ['banners' => $banners, 'companys' => $companys, 'bands' => $bands, 'products' => $products]);
});

Route::get('/home', function () {
    return view('/index');
});


Route::get('/product', 'App\Http\Controllers\ProductController@index'   
);

Route::get('login', 'App\Http\Controllers\AccoutController@accountVerification');
Route::post('login', 'App\Http\Controllers\AccoutController@login');
Route::post('signin', 'App\Http\Controllers\AccoutController@signin');
Route::get('/logout', 'App\Http\Controllers\AccoutController@logout')->name('logout');

Route::get('/getProducts', 'App\Http\Controllers\ProductController@getProducts'   
);


Route::get('/product/{id}', 'App\Http\Controllers\ProductController@detail')->name('product.detail');
Route::get('getproductsbyBand','App\Http\Controllers\ProductController@getProductsbyBand')->name('admin.product.getProductsByBand');
route::get('updateProduct/{pid}','App\Http\Controllers\ProductController@editProduct');
Route::post('updateProduct/{pid}','App\Http\Controllers\ProductController@updateProduct');
Route::get('deleteProduct/{pid}','App\Http\Controllers\ProductController@deleteProduct');
Route::get('insertProduct','App\Http\Controllers\ProductController@showInsertForm');
Route::post('insertProduct','App\Http\Controllers\ProductController@insertProduct');
Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'product'], function(){
    });
});


// Accout

Route::get('/getAccouts', 'App\Http\Controllers\AccoutController@getAccouts');
Route::get('getaccoutSearch','App\Http\Controllers\AccoutController@getaccoutSearch')->name('admin.accout.getAccoutSearch');
route::get('updateAccout/{pid}','App\Http\Controllers\AccoutController@editAccout');
Route::get('deleteAccout/{pid}','App\Http\Controllers\AccoutController@deleteAccout');
Route::get('insertAccout','App\Http\Controllers\AccoutController@showInsertAccout');
Route::post('insertAccout','App\Http\Controllers\AccoutController@insertAccout');
Route::post('updateAccout/{pid}','App\Http\Controllers\AccoutController@updateAccout');


// Inventory

Route::get('/getInventories', 'App\Http\Controllers\InventoryController@getInventories');
Route::get('getInventorySearch','App\Http\Controllers\InventoryController@getInventorySearch')->name('admin.inventory.getInventorySearch');
route::get('updateInventory/{InventoryID}','App\Http\Controllers\InventoryController@editInventory');
Route::get('deleteInventory/{InventoryID}','App\Http\Controllers\InventoryController@deleteInventory');
Route::get('insertInventory','App\Http\Controllers\InventoryController@showInsertInventory');
Route::post('insertInventory','App\Http\Controllers\InventoryController@insertInventory');
Route::post('updateInventory/{InventoryID}','App\Http\Controllers\InventoryController@updateInventory');


// Banner

Route::get('/getBanners', 'App\Http\Controllers\BannerController@getBanners');
route::get('updateBanner/{id}','App\Http\Controllers\BannerController@editBanner');
Route::post('updateBanner/{id}','App\Http\Controllers\BannerController@updateBanner');
Route::get('deleteBanner/{id}','App\Http\Controllers\BannerController@deleteBanner');
Route::get('insertBanner','App\Http\Controllers\BannerController@showInsertBanner');
Route::post('insertBanner','App\Http\Controllers\BannerController@insertBanner');


// Company

Route::get('/getCompanys', 'App\Http\Controllers\CompanyController@getCompanys');
route::get('updateCompany/{id}','App\Http\Controllers\CompanyController@editCompany');
Route::get('deleteCompany/{id}','App\Http\Controllers\CompanyController@deleteCompany');
Route::get('insertCompany','App\Http\Controllers\CompanyController@showInsertCompany');
Route::post('insertCompany','App\Http\Controllers\CompanyController@insertCompany');
Route::post('updateCompany/{id}','App\Http\Controllers\CompanyController@updateCompany');


// Band

Route::get('/getBands', 'App\Http\Controllers\BandController@getBands');
route::get('updateBand/{id}','App\Http\Controllers\BandController@editBand');
Route::get('deleteBand/{id}','App\Http\Controllers\BandController@deleteBand');
Route::get('insertBand','App\Http\Controllers\BandController@showInsertBand');
Route::post('insertBand','App\Http\Controllers\BandController@insertBand');
Route::post('updateBand/{id}','App\Http\Controllers\BandController@updateBand');