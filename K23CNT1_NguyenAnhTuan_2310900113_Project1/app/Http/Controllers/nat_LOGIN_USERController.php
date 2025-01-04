<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nat_KHACH_HANG;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class nat_LOGIN_USERController extends Controller
{
    // Show login form
    public function natLogin()
    {
        return view('natuser.login');
    }

    // Handle login form submission
   // Handle login form submission
public function natLoginSubmit(Request $request)
{
    // Validate the input data
    $request->validate([
        'natEmail' => 'required|email',
        'natMatKhau' => 'required|string',
    ]);

    // Tìm người dùng theo email
    $user = nat_KHACH_HANG::where('natEmail', $request->natEmail)->first();

    // Xóa giỏ hàng trong session khi đăng nhập
    Session::forget('cart');

    // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
    if ($user && Hash::check($request->natMatKhau, $user->natMatKhau)) {
        
        // Kiểm tra trạng thái tài khoản
        if ($user->natTrangThai == 2) {
            // Tài khoản bị khóa
            return redirect()->back()->withErrors(['natEmail' => 'Tài khoản của bạn đã bị khóa.']);
        } elseif ($user->natTrangThai == 1) {
            // Tài khoản bị tạm khóa
            return redirect()->back()->withErrors(['natEmail' => 'Tài khoản của bạn đã bị tạm khóa.']);
        }

        // Đăng nhập người dùng
        Auth::login($user);

        // Lưu thông tin người dùng vào session
        Session::put('user_id', $user->id);
        Session::put('username1', $user->natHoTenKhachHang);  // Lưu tên người dùng
        Session::put('natEmail', $user->natEmail);  // Lưu email
        Session::put('natDienThoai', $user->natDienThoai);  // Lưu số điện thoại
        Session::put('natDiaChi', $user->natDiaChi);  // Lưu địa chỉ
        Session::put('natMaKhachHang', $user->natMaKhachHang);  // Lưu mã khách hàng

        // Lưu trữ các thông tin cần thiết vào session

        // Chuyển hướng người dùng tới trang chủ sau khi đăng nhập thành công
        return redirect()->route('natuser.home1')->with('message', 'Đăng Nhập Thành Công');
    } else {
        // Nếu thông tin không chính xác, trả về lỗi
        return redirect()->back()->withErrors(['natEmail' => 'Email hoặc Mật khẩu không đúng']);
    }
}


    public function logout()
{
    // Xóa giỏ hàng trong session khi người dùng đăng xuất
    Session::forget('cart');

    // Tiến hành đăng xuất
}

    

}