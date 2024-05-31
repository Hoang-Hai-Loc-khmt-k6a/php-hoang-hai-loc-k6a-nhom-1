<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;
use App\Models\BandModel;

class BandController extends Controller
{
    function getBands(){
        $bands = BandModel::all();
        return view('admin.band.getBands', ['bands' => $bands]);
    }

    function editBand($id){
        $band = BandModel::findOrFail($id);
        $companys = CompanyModel::all();
        return view('admin.band.updateBand', ['band' => $band], ['companys' => $companys]);
    }

    function updateBand(Request $request, $id){
        $band = BandModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'company' => 'required|string|max:50',
        ]);

        $band->name = $request->name;
        $band->company = $request->company;

        $band->save();
        return redirect('updateBand/' . $id)->with("Note", "Sửa thành công!");
    }

    function deleteBand($id){
        $band = BandModel::findOrFail($id);
        $band->delete();
        return redirect('getCompanys')->with("Note", "Xóa $id thành công!");
    }

    public function showInsertBand()
    {
        $companys = CompanyModel::all();
        return view('admin.band.insertBand', ['companys' => $companys]);
    }

    public function insertBand(Request $request)
    {
        $name = $request->input('name');
        $company = $request->input('company');

        $band = new BandModel();
        $band->name = $name;
        $band->company = $company;

        $band->save();
        return redirect('insertBand/')->with("Note", "Thêm mới thành công!");
    }
}
