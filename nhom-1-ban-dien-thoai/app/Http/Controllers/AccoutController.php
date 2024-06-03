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
        $fullname = $accout->fullname;
        session(['fullname' => $fullname]);
        if ($accout && $accout->role == "admin") {
            session(['admin' => 1]);
            return $this->getAccouts();
        }
        elseif ($accout && $accout->role == "customer") {
            return redirect('./');
        }

        else {
            return redirect('login')->with("accout", "Đăng nhập không thành công");
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
        try {
            // Sử dụng Validator để kiểm tra các trường dữ liệu
            $validated = $request->validate([
                'username' => 'required|string|max:255|unique:accouts,username',
                'password' => 'required|string|min:6',
                'email' => 'required|email|unique:accouts,email',
                'fullname' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'address' => 'required|string|max:255',
                'role' => 'required|string|max:50',
            ]);

            // Tạo mới một đối tượng AccoutModel
            $accout = new AccoutModel();
            $accout->username = $request->username;
            $accout->password = $request->password;
            $accout->email = $request->email;
            $accout->fullname = $request->fullname;
            $accout->phone = $request->phone;
            $accout->address = $request->address;
            $accout->role = $request->role;

            // Lưu vào cơ sở dữ liệu
            $accout->save();

            // Chuyển hướng tới trang insertAccout với thông báo thành công
            return redirect('insertAccout/')->with("Note", "Thêm mới thành công!");
        } catch (\Exception $e) {
            // Bắt các lỗi xảy ra và chuyển hướng tới trang insertAccout với thông báo lỗi
            return redirect('insertAccout/')->with("error", $e->getMessage());
        }
    }

    public function signin(Request $request)
    {
            // Tạo mới một đối tượng AccoutModel
            $accout = new AccoutModel();
            $accout->password = $request->password;
            $accout->email = $request->email;
            $accout->fullname = $request->fullname;

            // Lưu vào cơ sở dữ liệu
            $accout->save();

            // Chuyển hướng tới trang login với thông báo thành công
            return redirect('login/')->with("createAccout", "Tạo tài khoản thành công!")
            ->withInput(['email' => $request->email, 'password' => $request->password]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('index.php');
    }
}
