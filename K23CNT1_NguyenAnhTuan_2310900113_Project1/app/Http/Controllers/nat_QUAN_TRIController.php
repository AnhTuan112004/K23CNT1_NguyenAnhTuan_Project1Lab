<?php

namespace App\Http\Controllers;

use App\Models\nat_QUAN_TRI; // Thêm dòng này để sử dụng Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Thêm dòng này để sử dụng session

class nat_QUAN_TRIController extends Controller
{
    // GET login (authentication)
    public function natLogin()
    {
        return view('natAdmins.nat-login');
    }

    // POST login (authentication)
    public function natLoginSubmit(Request $request)
    {
        // Validate tài khoản và mật khẩu
        $request->validate([
            'natTaiKhoan' => 'required|string',
            'natMatKhau' => 'required|string',
        ]);

        // Tìm người dùng trong bảng nat_QUAN_TRI
        $user = nat_QUAN_TRI::where('natTaiKhoan', $request->natTaiKhoan)->first();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->natMatKhau, $user->natMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUsingId($user->id);

            // Lưu tên tài khoản vào session
            Session::put('username', $user->natTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('/nat-admins')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu sai
            return redirect()->back()->withErrors(['natMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    public function natlist()
{
    $natquantris = nat_QUAN_TRI::all(); // Lấy tất cả quản trị viên
    return view('natAdmins.natquantri.nat-list', ['natquantris'=>$natquantris]);
}

public function natDetail($id)
    {
        $natquantri = nat_QUAN_TRI::where('id', $id)->first();
        return view('natAdmins.natquantri.nat-detail',['natquantri'=>$natquantri]);

    }

    //create
    // GET: Hiển thị form thêm mới quản trị viên
public function natCreate()
{
    return view('natAdmins.natquantri.nat-create');
}

// POST: Xử lý form thêm mới quản trị viên
public function natCreateSubmit(Request $request)
{
    // Xác thực dữ liệu
    $request->validate([
        'natTaiKhoan' => 'required|string|unique:nat_quan_tri,natTaiKhoan',
        'natMatKhau' => 'required|string|min:6',
        'natTrangThai' => 'required|in:0,1', 
    ]);

    // Tạo bản ghi mới trong cơ sở dữ liệu
    $natquantri = new nat_QUAN_TRI();
    $natquantri->natTaiKhoan = $request->natTaiKhoan;
    $natquantri->natMatKhau = Hash::make($request->natMatKhau); // Mã hóa mật khẩu
    $natquantri->natTrangThai = $request->natTrangThai;
    $natquantri->save();

    // Chuyển hướng về trang danh sách với thông báo thành công
    return redirect()->route('natadmins.natquantri')->with('success', 'Thêm quản trị viên thành công');
}

// edit
// GET: Hiển thị form chỉnh sửa quản trị viên
public function natEdit($id)
{
    $natquantri = nat_QUAN_TRI::find($id); // Lấy thông tin quản trị viên cần chỉnh sửa
    if (!$natquantri) {
        return redirect()->route('natadmins.natquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    return view('natAdmins.natquantri.nat-edit', ['natquantri'=>$natquantri]);
}

// POST: Xử lý form chỉnh sửa quản trị viên
public function natEditSubmit(Request $request, $id)
{
    // Xác thực dữ liệu
    $request->validate([
        'natTaiKhoan' => 'required|string|unique:nat_quan_tri,natTaiKhoan,' . $id,
        'natMatKhau' => 'nullable|string|min:6', // Cho phép mật khẩu trống
        'natTrangThai' => 'required|in:0,1',
    ]);

    // Lấy quản trị viên cần sửa
    $natquantri = nat_QUAN_TRI::find($id);
    if (!$natquantri) {
        return redirect()->route('natadmins.natquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }

    // Cập nhật thông tin
    $natquantri->natTaiKhoan = $request->natTaiKhoan;
    if ($request->natMatKhau) {
        $natquantri->natMatKhau = Hash::make($request->natMatKhau); // Cập nhật mật khẩu nếu có
    }
    $natquantri->natTrangThai = $request->natTrangThai;
    $natquantri->save();

    return redirect()->route('natadmins.natquantri')->with('success', 'Cập nhật quản trị viên thành công');
}

// delete
public function natDelete($id)
{
    $natquantri = nat_QUAN_TRI::find($id); // Tìm quản trị viên cần xóa
    if (!$natquantri) {
        return redirect()->route('natadmins.natquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    $natquantri->delete(); // Xóa bản ghi

    return redirect()->route('natadmins.natquantri')->with('success', 'Xóa quản trị viên thành công');
}



}