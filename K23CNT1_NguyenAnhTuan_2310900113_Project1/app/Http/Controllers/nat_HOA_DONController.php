<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nat_HOA_DON; 
use App\Models\nat_KHACH_HANG; 
use App\Models\nat_SAN_PHAM; 
class nat_HOA_DONController extends Controller
{
    //
    public function show($hoaDonId,$sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = nat_HOA_DON::findOrFail($hoaDonId);
        $sanPham = nat_SAN_PHAM::findOrFail($sanPhamId);

        // Trả về view để hiển thị thông tin hóa đơn
        return view('natuser.hoadonshow', compact('hoaDon','sanPham'));
    }


      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function natList()
    {
        $nathoadons = nat_HOA_DON::all();
        return view('natAdmins.nathoadon.nat-list',['nathoadons'=>$nathoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function natDetail($id)
    {
        // Tìm sản phẩm theo ID
        $nathoadon = nat_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('natAdmins.nathoadon.nat-detail', ['nathoadon' => $nathoadon]);
    }
    // create
    public function natCreate()
    {
        $natkhachhang = nat_KHACH_HANG::all();
        return view('natAdmins.nathoadon.nat-create',['natkhachhang'=>$natkhachhang]);
    }
    //post
    public function natCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'natMaHoaDon' => 'required|unique:nat_hoa_don,natMaHoaDon',
            'natMaKhachHang' => 'required|exists:nat_khach_hang,id',
            'natNgayHoaDon' => 'required|date',  
            'natNgayNhan' => 'required|date',
            'natHoTenKhachHang' => 'required|string',  
            'natEmail' => 'required|email',
            'natDienThoai' => 'required|numeric',  
            'natDiaChi' => 'required|string',  
            'natTongGiaTri' => 'required|numeric',  // Đã thay đổi thành numeric (cho kiểu double)
            'natTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Tạo một bản ghi hóa đơn mới
        $nathoadon = new nat_HOA_DON;
    
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $nathoadon->natMaHoaDon = $request->natMaHoaDon;
        $nathoadon->natMaKhachHang = $request->natMaKhachHang;  // Giả sử đây là khóa ngoại
        $nathoadon->natHoTenKhachHang = $request->natHoTenKhachHang;
        $nathoadon->natEmail = $request->natEmail;
        $nathoadon->natDienThoai = $request->natDienThoai;
        $nathoadon->natDiaChi = $request->natDiaChi;
        
        // Lưu 'natTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $nathoadon->natTongGiaTri = (double) $request->natTongGiaTri; // Chuyển đổi sang double
        
        $nathoadon->natTrangThai = $request->natTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $nathoadon->natNgayHoaDon = $request->natNgayHoaDon;
        $nathoadon->natNgayNhan = $request->natNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $nathoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('natadmins.nathoadon');
    }
    


    public function natEdit($id)
    {
        $nathoadon = nat_HOA_DON::where('id', $id)->first();
        $natkhachhang = nat_KHACH_HANG::all();
        return view('natAdmins.nathoadon.nat-edit',['natkhachhang'=>$natkhachhang,'nathoadon'=>$nathoadon]);
    }
    //post
    public function natEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'natMaHoaDon' => 'required|unique:nat_hoa_don,natMaHoaDon,'. $id,
            'natMaKhachHang' => 'required|exists:nat_khach_hang,id',
            'natNgayHoaDon' => 'required|date',  
            'natNgayNhan' => 'required|date',
            'natHoTenKhachHang' => 'required|string',  
            'natEmail' => 'required|email',
            'natDienThoai' => 'required|numeric',  
            'natDiaChi' => 'required|string',  
            'natTongGiaTri' => 'required|numeric', 
            'natTrangThai' => 'required|in:0,1,2',
        ]);
    
        $nathoadon = nat_HOA_DON::where('id', $id)->first();
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $nathoadon->natMaHoaDon = $request->natMaHoaDon;
        $nathoadon->natMaKhachHang = $request->natMaKhachHang;  // Giả sử đây là khóa ngoại
        $nathoadon->natHoTenKhachHang = $request->natHoTenKhachHang;
        $nathoadon->natEmail = $request->natEmail;
        $nathoadon->natDienThoai = $request->natDienThoai;
        $nathoadon->natDiaChi = $request->natDiaChi;
        
        // Lưu 'natTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $nathoadon->natTongGiaTri = (double) $request->natTongGiaTri; // Chuyển đổi sang double
        
        $nathoadon->natTrangThai = $request->natTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $nathoadon->natNgayHoaDon = $request->natNgayHoaDon;
        $nathoadon->natNgayNhan = $request->natNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $nathoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('natadmins.nathoadon');
    }
    
        //delete
        public function natDelete($id)
        {
            nat_HOA_DON::where('id',$id)->delete();
            return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}