<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nat_KHACH_HANG; 
class nat_KHACH_HANGcontroller extends Controller
{
    //
    // CRUD
    // list
    public function natList()
    {
        $khachhangs = nat_KHACH_HANG::all();
        return view('natAdmins.natkhachhang.nat-list',['khachhangs'=>$khachhangs]);
    }
    // detail 
    public function natDetail($id)
    {
        $natkhachhang = nat_KHACH_HANG::where('id',$id)->first();
        return view('natAdmins.natkhachhang.nat-detail',['natkhachhang'=>$natkhachhang]);
    }
    // create
    public function natCreate()
    {
        return view('natAdmins.natkhachhang.nat-create');
    }
    //post
    public function natCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'natMaKhachHang' => 'required|unique:nat_khach_hang,natMaKhachHang',
            'natHoTenKhachHang' => 'required|string',
            'natEmail' => 'required|email|unique:nat_khach_hang,natEmail',  
            'natMatKhau' => 'required|min:6',
            'natDienThoai' => 'required|numeric|unique:nat_khach_hang,natDienThoai',  
            'natDiaChi' => 'required|string',
            'natNgayDangKy' => 'required|date',  
            'natTrangThai' => 'required|in:0,1,2',
        ]);

        $natkhachhang = new nat_KHACH_HANG;
        $natkhachhang->natMaKhachHang = $request->natMaKhachHang;
        $natkhachhang->natHoTenKhachHang = $request->natHoTenKhachHang;
        $natkhachhang->natEmail = $request->natEmail;
        $natkhachhang->natMatKhau = $request->natMatKhau;
        $natkhachhang->natDienThoai = $request->natDienThoai;
        $natkhachhang->natDiaChi = $request->natDiaChi;
        $natkhachhang->natNgayDangKy = $request->natNgayDangKy;
        $natkhachhang->natTrangThai = $request->natTrangThai;

        $natkhachhang->save();

        return redirect()->route('natadmins.natkhachhang');


    }

    // edit
    public function natEdit($id)
    {
        // Lấy khách hàng theo id
        $natkhachhang = nat_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$natkhachhang) {
            return redirect()->route('natadmins.natkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('natAdmins.natkhachhang.nat-edit', ['natkhachhang' => $natkhachhang]);
    }
    
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
        $natkhachhang = nat_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$natkhachhang) {
            return redirect()->route('natadmins.natkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $natkhachhang->natMaKhachHang = $request->natMaKhachHang;
        $natkhachhang->natHoTenKhachHang = $request->natHoTenKhachHang;
        $natkhachhang->natEmail = $request->natEmail;
        $natkhachhang->natMatKhau = $request->natMatKhau;
        $natkhachhang->natDienThoai = $request->natDienThoai;
        $natkhachhang->natDiaChi = $request->natDiaChi;
        $natkhachhang->natNgayDangKy = $request->natNgayDangKy;
        $natkhachhang->natTrangThai = $request->natTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $natkhachhang->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('natadmins.natkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    
    //delete
    public function natDelete($id)
    {
        nat_KHACH_HANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}