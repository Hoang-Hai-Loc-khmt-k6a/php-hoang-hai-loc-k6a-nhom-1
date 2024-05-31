<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    function getCompanys(){
        $companys = CompanyModel::all();
        return view('admin.company.getCompanys', ['companys' => $companys]);
    }

    function getCompanySearch(Request $request)
    {
        $name = $request->input('name');

        $query = CompanyModel::query();

        if (!empty($name)) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        $companys = $query->get();

        return view('admin.company.getCompanySearch', ['companys' => $companys]);
    }

    function editCompany($id){
        $company = CompanyModel::findOrFail($id);
        return view('admin.company.updateCompany', ['company' => $company]);
    }

    function updateCompany(Request $request, $id){
        $company = CompanyModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $company->name = $request->name;

        $company->save();
        return redirect('updateCompany/' . $id)->with("Note", "Sửa thành công!");
    }

    function deleteCompany($id){
        $company = CompanyModel::findOrFail($id);
        $company->delete();
        return redirect('getCompanys')->with("Note", "Xóa $id thành công!");
    }

    public function showInsertCompany()
    {
        $companys = CompanyModel::all();
        return view('admin.company.insertCompany', ['companys' => $companys]);
    }

    public function insertCompany(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');

        $company = new CompanyModel();
        $company->id = $id;
        $company->name = $name;

        $company->save();
        return redirect('insertCompany/')->with("Note", "Thêm mới thành công!");
    }
}
