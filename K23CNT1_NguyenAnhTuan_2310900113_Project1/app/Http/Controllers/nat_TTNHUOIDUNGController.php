<?php

namespace App\Http\Controllers;

use App\Models\nat_KHACH_HANG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Đảm bảo thêm dòng này

class nat_TTNHUOIDUNGController extends Controller
{
    // Hiển thị form chỉnh sửa thông tin khách hàng
    public function natEdit($id)
    {
        // Lấy khách hàng theo id
        $natuser = nat_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$natuser) {
            return redirect()->route('natuser.home1')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('natuser.ttuser', ['natuser' => $natuser]);
    }
    
    // Xử lý submit form chỉnh sửa
    public function natEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validate = $request->validate([
            'natMaKhachHang' => 'required|unique:nat_khach_hang,natMaKhachHang,' . $id, // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'natHoTenKhachHang' => 'required|string',
            'natEmail' => 'required|email|unique:nat_khach_hang,natEmail,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'natMatKhau' => 'nullable|min:6', // Mật khẩu không bắt buộc khi cập nhật
            'natDienThoai' => 'required|numeric|unique:nat_khach_hang,natDienThoai,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'natDiaChi' => 'required|string',
            'natNgayDangKy' => 'required|date',
            'natTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Lấy khách hàng theo id
        $natuser = nat_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$natuser) {
            return redirect()->route('natuser.home1')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $natuser->natMaKhachHang = $request->natMaKhachHang;
        $natuser->natHoTenKhachHang = $request->natHoTenKhachHang;
        $natuser->natEmail = $request->natEmail;
        
        // Kiểm tra nếu người dùng nhập mật khẩu mới
        if ($request->filled('natMatKhau')) {
            // Nếu có mật khẩu mới, mã hóa và cập nhật
            $natuser->natMatKhau = Hash::make($request->natMatKhau);
        }
        
        $natuser->natDienThoai = $request->natDienThoai;
        $natuser->natDiaChi = $request->natDiaChi;
        $natuser->natNgayDangKy = $request->natNgayDangKy;
        $natuser->natTrangThai = $request->natTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $natuser->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('natuser.home1')->with('success', 'Cập nhật khách hàng thành công!');
    }
}