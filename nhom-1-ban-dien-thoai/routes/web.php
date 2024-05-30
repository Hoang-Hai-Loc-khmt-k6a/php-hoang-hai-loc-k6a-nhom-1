<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $html = "<h1> WELCOME TO HANOI </h1>";
    return $html;
});

Route::get('/greeding', function () {
    
    return view('greeding',['name'=>'JAME']);
});

Route::get('/product', 'App\Http\Controllers\ProductController@index'   
);

Route::get('/login', 'App\Http\Controllers\ProductController@login'   
);

Route::get('/getProducts', 'App\Http\Controllers\ProductController@getProducts'   
);


Route::get('getproductsbyBand','App\Http\Controllers\ProductController@getProductsbyBand')->name('admin.product.getProductsByBand');
route::get('updateProduct/{pid}','App\Http\Controllers\ProductController@editProduct');

Route::post('updateProduct/{pid}','App\Http\Controllers\ProductController@updateProduct');
Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'product'], function(){
    });
});

Route::get('deleteProduct/{pid}','App\Http\Controllers\ProductController@deleteProduct');

Route::get('insertProduct','App\Http\Controllers\ProductController@showInsertForm');

Route::post('insertProduct','App\Http\Controllers\ProductController@insertProduct');


// Accout

Route::get('/getAccouts', 'App\Http\Controllers\AccoutController@getAccouts');
Route::get('getaccoutSearch','App\Http\Controllers\AccoutController@getaccoutSearch')->name('admin.accout.getAccoutSearch');
route::get('updateAccout/{pid}','App\Http\Controllers\AccoutController@editAccout');
Route::get('deleteAccout/{pid}','App\Http\Controllers\AccoutController@deleteAccout');
Route::get('insertAccout','App\Http\Controllers\AccoutController@showInsertAccout');
Route::post('insertAccout','App\Http\Controllers\AccoutController@insertAccout');
Route::post('updateAccout/{pid}','App\Http\Controllers\AccoutController@updateAccout');
Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'accout'], function(){
    });
});


// Inventory

Route::get('/getInventories', 'App\Http\Controllers\InventoryController@getInventories');
Route::get('getInventorySearch','App\Http\Controllers\InventoryController@getInventorySearch')->name('admin.inventory.getInventorySearch');
route::get('updateInventory/{InventoryID}','App\Http\Controllers\InventoryController@editInventory');
Route::get('deleteInventory/{InventoryID}','App\Http\Controllers\InventoryController@deleteInventory');
Route::get('insertInventory','App\Http\Controllers\InventoryController@showInsertInventory');
Route::post('insertInventory','App\Http\Controllers\InventoryController@insertInventory');
Route::post('updateInventory/{InventoryID}','App\Http\Controllers\InventoryController@updateInventory');
Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'inventory'], function(){
    });
});
