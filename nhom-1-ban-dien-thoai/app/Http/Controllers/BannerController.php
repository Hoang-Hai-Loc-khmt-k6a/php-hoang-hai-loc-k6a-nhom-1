<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerModel;

class BannerController extends Controller
{
    public function index()
    {
        return view('banner'); // Trả về trang banner.blade.php
    }

    public function getBanners()
    {
        $banners = BannerModel::all();
        return view('admin.banner.getBanners', ['banners' => $banners]);
    }

    public function editBanner($id)
    {
        $banner = BannerModel::find($id);
        return view('admin.banner.updateBanner', ['banner' => $banner]);
    }

    public function updateBanner(Request $request, $id)
    {
        $banner = BannerModel::find($id);
        $banner->title = $request->title;
        $banner->link_url = $request->link_url;

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('banner'), $imageName);
            $banner->image_url = 'banner/'.$imageName;
        }

        $banner->save();
        return redirect('updateBanner/'.$id)->with("Note", "Sửa thành công!");
    }

    public function deleteBanner($id)
    {
        $banner = BannerModel::find($id);
        $banner->delete();
        return redirect('getBanners')->with("Note", "Xóa $id thành công!");
    }

    public function showInsertBanner()
    {
        return view('admin.banner.insertBanner');
    }

    public function insertBanner(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'required|image',
            'link_url' => 'nullable|string|max:255'
        ]);

        $image = $request->file('image_url');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('banner'), $imageName);

        $banner = new BannerModel();
        $banner->title = $request->title;
        $banner->image_url = 'banner/'.$imageName;
        $banner->link_url = $request->link_url;
        $banner->save();

        return redirect('insertBanner/')->with("Note", "Thêm thành công!");
    }
}
