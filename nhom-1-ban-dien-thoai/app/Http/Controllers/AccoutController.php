<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccoutModel;

class AccoutController extends Controller
{
    public function accountVerification()
    {
        return view('login');
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $accout = AccoutModel::where('email', $email)->where('password', $password)->first();
        if ($accout && $accout->role == "admin") {
            return $this->getAccouts();
        } else {
            return redirect('login')->with("accout", "1");
        }
    }

    function getAccouts(){
        $accouts = AccoutModel::all();
        return view('admin.accout.getAccouts', ['accouts' => $accouts], );
    }

    function getaccoutSearch(Request $request)
    {
        $role = $request->input('role');

        $query = AccoutModel::query();

        if (!empty($role)) {
            $query->where('role', $role);
        }

        $accouts = $query->get();

        return view('admin.accout.getAccoutSearch', ['accouts' => $accouts]);
    }

    function editAccout($id){
        $accout = AccoutModel::findOrFail($id);
        return view('admin.accout.updateAccout', ['accout' => $accout]);
    }

    function updateAccout(Request $request, $id){
        $accout = AccoutModel::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:100',
            'fullname' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'role' => 'required|string|max:20',
        ]);

        $accout->username = $request->username;
        $accout->password = $request->password;
        $accout->email = $request->email;
        $accout->fullname = $request->fullname;
        $accout->phone = $request->phone;
        $accout->address = $request->address;
        $accout->role = $request->role;

        $accout->save();
        return redirect('updateAccout/' . $id)->with("Note", "Sửa thành công!");
    }

    function deleteAccout($id){
        $accout = AccoutModel::findOrFail($id);
        $accout->delete();
        return redirect('getAccouts')->with("Note", "Xóa $id thành công!");
    }

    public function showInsertAccout()
    {
        return view('admin.accout.insertAccout');
    }
    public function insertAccout(Request $request)
    {
        // Validate and get form data
        
        

        $accout = new AccoutModel();
        $accout->username = $request->username;
        $accout->password = $request->password;
        $accout->email = $request->email;
        $accout->fullname = $request->fullname;
        $accout->phone = $request->phone;
        $accout->address = $request->address;
        $accout->role = $request->role;

        $accout->save();
        return redirect('insertAccout/')->with("Note", "Thêm mới thành công!");
    }

    public function themtaikhoan(Request $request)
    {
        // Validate and get form data
        
        
        $password = $request->thempassword;
        $email = $request->thememail;
        $fullname = $request->themfullname;      
        
        $accout = new AccoutModel();      
        $accout->password = $password;
        $accout->email = $email;
        $accout->fullname = $fullname;
        
        $accout->save();
        return redirect('login')->with("Note", "Thêm mới thành công!");
    }

}
