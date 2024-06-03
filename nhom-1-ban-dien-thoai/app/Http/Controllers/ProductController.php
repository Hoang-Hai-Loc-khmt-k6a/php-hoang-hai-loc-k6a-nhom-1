<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use ProductModel;
use App\Models\ProductModel;
use App\Models\BandModel;
use App\Models\CompanyModel;
use App\Models\BannerModel;


class ProductController extends Controller
{
    public function index()
    {
        return view('product'); //tra ve trang product.blade.php
    }

    function getProducts(){
        $products = ProductModel::all();
        return view('admin.product.getProducts',['products'=>$products]);
    }

    function getProductsbyBand(Request $request)
    {
        $band = $request->input('band');
        $company = $request->input('company');
        $year = $request->input('year');

        // Start building the query
        $query = ProductModel::query();

        // Add band filter if it's not empty
        if (!empty($band)) {
            $query->where('band', $band);
        }

        // Add company filter if it's not empty
        if (!empty($company)) {
            $query->where('company', $company);
        }

        // Add year filter if it's not empty
        if (!empty($year)) {
            $query->where('year', $year);
        }

        // Execute the query and get the results
        $products = $query->get();

        return view('admin.product.getProductsByBand', ['products' => $products]);
    }

    function editProduct($pid){
        $product = ProductModel::where('pid', $pid)->first();
        $bands = BandModel::all();
        $companys = CompanyModel::all();
        return view(('admin/product/updateProduct'),['product'=> $product, 'bands'=>$bands, 'companys'=>$companys]);
    }

    function updateProduct(Request $request ,$pid){
        $mostview = $request->mostview === 'on' ? 1 : 0;
        $product = ProductModel::where("pid", $pid)->first();
        $product ->pid = $request->pid;
        $product ->pname = $request->pname;
        $product ->company = $request->company;
        $product ->band = $request->band;
        $product ->year = $request->year;
        $product->price = $request->price * 1000;
        $product ->hotsale = $request->hotsale * 1000;
        $product ->mostview = $mostview;
        $product ->description = $request->description;

        if ($request->file('imageUrl')){
            $image = $request->file('imageUrl');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = 'images/'.$imageName;          
        }
        else{
            $image = $request->input('oldImageUrl');
        }

        $product ->save();
        return redirect('updateProduct/'.$pid)->with("Note","Sửa thành công!");
    }

    function deleteProduct($pid){
        $product = ProductModel::where("pid", $pid)->first();
        $product ->delete();
        return redirect('getProducts')->with("Note","Xoá $pid thành công!");
    }

    public function showInsertForm()
    {
        $companys = CompanyModel::all();
        $bands = BandModel::all();
        return view('admin/product/insertProduct',['bands'=>$bands, 'companys'=>$companys]);
    }

    // Method to handle the insert product form submission
    
    public function insertProduct(Request $request)
    {
        $pid = $request->input('pid');
        $price = $request->input('price') * 1000;
        $hotsale = $request->input('hotsale') * 1000;
        $mostview = $request->input('mostview') === 'on' ? 1 : 0;

        $image = $request->file('imageUrl');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        // Check if pid already exists in the database
        if (ProductModel::where('pid', $pid)->exists()) {
            // Set error message in session
            return redirect('insertProduct/')->with("Note","PID đã có trên hệ thống!");
        }

        // Insert product into the database
        $product = new ProductModel();
        $product->pid = $pid;
        $product->pname = $request->pname;
        $product->company = $request->company;
        $product->band = $request->band;
        $product->year = $request->year;
        $product->price = $price;
        $product->hotsale = $hotsale;
        $product->mostview = $mostview;
        $product->description = $request->description;
        $product->image = 'images/'.$imageName;
        $product->save();

        // Set success message in session
        return redirect('insertProduct/')->with("Note","Thêm thành công!");
    }

    public function detail($id)
    {
        $product = ProductModel::find($id);
        $banners = BannerModel::all();
        $companys = CompanyModel::all();
        $bands = BandModel::all();
        $products = ProductModel::all();

        return view('admin/product/detailProduct', compact('product', 'banners', 'companys', 'bands', 'products'));
    }

}
