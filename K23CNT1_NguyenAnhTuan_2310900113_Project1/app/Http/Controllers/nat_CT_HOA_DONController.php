<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nat_CT_HOA_DON; 
use App\Models\nat_SAN_PHAM; 
use App\Models\nat_HOA_DON; 
use App\Models\nat_KHACH_HANG; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class nat_CT_HOA_DONController extends Controller
{
   //create hoadon user

  // Controller
public function show($sanPhamId)
{
    $sanPham = nat_SAN_PHAM::find($sanPhamId);

    // Lấy Mã Khách Hàng từ session
    $userId = Session::get('natMaKhachHang');

    // Kiểm tra khách hàng tồn tại trong hệ thống
    $khachHang = nat_KHACH_HANG::find($userId);

    // Truyền thông tin qua view
    return view('natuser.hoadon', [
        'sanPham' => $sanPham,
        'khachHang' => $khachHang, // Truyền thông tin khách hàng vào view
    ]);
}
  

  
  


   /**
    * Xử lý khi người dùng nhấn "Mua", tạo hóa đơn tự động.
    */
    public function store(Request $request)
    {
        // Lấy Mã Khách Hàng từ session
        $userId = Session::get('natMaKhachHang'); // Lấy ID khách hàng từ session
    
        // Kiểm tra nếu không có khách hàng trong session
        if (!$userId) {
            return redirect()->route('natuser.login')->with('error', 'Vui lòng đăng nhập để tiếp tục!');
        }
    
        // Kiểm tra khách hàng tồn tại trong bảng nat_KHACH_HANG
        $khachhang = nat_KHACH_HANG::find($userId);
        if (!$khachhang) {
            return redirect()->route('natuser.login')->with('error', 'Khách hàng không tồn tại.');
        }
    
        // Lấy thông tin sản phẩm từ bảng nat_SAN_PHAM
        $sanPham = nat_SAN_PHAM::find($request->natSanPhamId);
        if (!$sanPham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        // Tạo mã hóa đơn tự động (natMaHoaDon)
        $natMaHoaDon = 'HD' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT); // Tạo mã hóa đơn ngẫu nhiên
    
        // Tạo hóa đơn mới với thông tin lấy từ khách hàng
        $hoaDon = nat_HOA_DON::create([
            'natMaHoaDon' => $natMaHoaDon,
            'natMaKhachHang' => $khachhang->id,  // Sử dụng ID của khách hàng từ bảng nat_KHACH_HANG
            'natNgayHoaDon' => Carbon::now()->toDateString(),
            'natNgayNhan' => Carbon::now()->addDays(3)->toDateString(),
            'natHoTenKhachHang' => $request->natHoTenKhachHang,
            'natEmail' => $request->natEmail,
            'natDienThoai' => $request->natDienThoai,
            'natDiaChi' => $request->natDiaChi,
            'natTongGiaTri' => $sanPham->natDonGia * $request->natSoLuong, // Tính tổng giá trị
            'natTrangThai' => 0, // 0 nghĩa là chưa thanh toán
        ]);
     
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('hoadon.show', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    
    
    

// xem cthoadon
public function create($hoaDonId, $sanPhamId)
{
    // Lấy thông tin hóa đơn và sản phẩm
    $hoaDon = nat_HOA_DON::find($hoaDonId);
    $sanPham = nat_SAN_PHAM::find($sanPhamId);

    // Kiểm tra nếu hóa đơn hoặc sản phẩm không tồn tại
    if (!$hoaDon || !$sanPham) {
        return redirect()->route('hoadon.index')->with('error', 'Hóa đơn hoặc sản phẩm không tồn tại.');
    }
 // Lấy số lượng từ request
 $soLuong = request('natSoLuong', 1); // Số lượng mặc định là 1 nếu không có giá trị
    // Truyền dữ liệu vào view
    return view('natuser.cthoadon', [
        'hoaDon' => $hoaDon,
        'sanPham' => $sanPham,
        'soLuong' => $soLuong // Truyền số lượng vào view
    ]);
}


public function cthoadonshow($hoaDonId, $sanPhamId)
{
    // Lấy hóa đơn từ ID
    $hoaDon = nat_HOA_DON::findOrFail($hoaDonId);

    // Lấy chi tiết hóa đơn từ ID
    $chiTietHoaDon = nat_CT_HOA_DON::where('natHoaDonID', $hoaDonId)
                                    ->where('natSanPhamID', $sanPhamId)
                                    ->firstOrFail();

    // Trả về view và truyền dữ liệu
    return view('natuser.cthoadonshow', compact('hoaDon', 'chiTietHoaDon'));
}





    public function storecthoadon(Request $request)
    {
        // Validate các dữ liệu yêu cầu
        $validated = $request->validate([
            'natSanPhamID' => 'required|exists:nat_SAN_PHAM,id',
            'natHoaDonID' => 'required|exists:nat_HOA_DON,id',
            'natSoLuong' => 'required|integer|min:1',
        ]);
    
        // Lấy thông tin sản phẩm và hóa đơn
        $sanPham = nat_SAN_PHAM::find($request->natSanPhamID);
        $hoaDon = nat_HOA_DON::find($request->natHoaDonID);
    
        // Kiểm tra xem sản phẩm và hóa đơn có tồn tại không
        if (!$sanPham || !$hoaDon) {
            return redirect()->back()->with('error', 'Sản phẩm hoặc hóa đơn không tồn tại.');
        }
    
        // Kiểm tra xem chi tiết hóa đơn đã tồn tại chưa
        $chiTietHoaDon = nat_CT_HOA_DON::where('natHoaDonID', $hoaDon->id)
                                        ->where('natSanPhamID', $sanPham->id)
                                        ->first();
    
        // Nếu chi tiết hóa đơn đã tồn tại, cập nhật số lượng và tính lại thành tiền
        if ($chiTietHoaDon) {
            // Cập nhật số lượng và tính lại tổng thành tiền
            $chiTietHoaDon->natSoLuongMua += $request->natSoLuong;  // Tăng số lượng
            $chiTietHoaDon->natThanhTien = $chiTietHoaDon->natSoLuongMua * $sanPham->natDonGia; // Tính lại thành tiền
            $chiTietHoaDon->save(); // Lưu cập nhật
        } else {
            // Nếu không tồn tại chi tiết hóa đơn, tạo mới chi tiết hóa đơn
            $natThanhTien = $request->natSoLuong * $sanPham->natDonGia;
    
            nat_CT_HOA_DON::create([
                'natHoaDonID' => $hoaDon->id, // ID hóa đơn
                'natSanPhamID' => $sanPham->id, // ID sản phẩm
                'natSoLuongMua' => $request->natSoLuong, // Số lượng mua
                'natDonGiaMua' => $sanPham->natDonGia, // Đơn giá của sản phẩm
                'natThanhTien' => $natThanhTien, // Tổng thành tiền
                'natTrangThai' => 1,  // Trạng thái đơn hàng đã xác nhận
            ]);
        }
    
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('cthoadon.cthoadonshow', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    


    
    
    

    
  // thanh toán
 // Hiển thị sản phẩm khi nhấn vào "Mua"
 public function natthanhtoan($product_id)
 {
     // Lấy sản phẩm theo ID sử dụng model
     $sanPham = nat_SAN_PHAM::find($product_id);

     // Kiểm tra nếu không có sản phẩm
     if (!$sanPham) {
         abort(404, 'Sản phẩm không tồn tại');
     }

     // Trả về view với thông tin sản phẩm
     return view('natuser.thanhtoan', compact('sanPham'));
 }

 // Lưu thông tin thanh toán (chỉ cần lưu vào bảng thanh toán nếu cần, ở đây ta không tạo bảng ThanhToan)
 public function storeThanhtoan(Request $request)
 {
     // Lấy thông tin sản phẩm từ model SanPham
     $sanPham = nat_SAN_PHAM::find($request->product_id);

     // Kiểm tra nếu không có sản phẩm
     if (!$sanPham) {
         return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
     }

     // Tính tổng tiền thanh toán
     $tongTien = $request->natSoLuong * $sanPham->natDonGia;

     // Nếu muốn lưu vào bảng thanh toán, bạn có thể thêm logic ở đây.
     // Nhưng ở đây chỉ cần hiển thị thông tin và tính tổng tiền.

     return view('natuser.thanhtoan', [
         'sanPham' => $sanPham,
         'natSoLuong' => $request->natSoLuong,
         'tongTien' => $tongTien
     ]);
 }

      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function natList()
    {
        $natcthoadons = nat_CT_HOA_DON::all();
        return view('natAdmins.natcthoadon.nat-list',['natcthoadons'=>$natcthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function natDetail($id)
    {
        // Tìm sản phẩm theo ID
        $natcthoadon = nat_CT_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('natAdmins.natcthoadon.nat-detail', ['natcthoadon' => $natcthoadon]);
    }

     // create-----------------------------------------------------------------------------------------------------------------------------------------
     public function natCreate()
     {
         $nathoadon = nat_HOA_DON::all();
         $natsanpham = nat_SAN_PHAM::all();
         return view('natAdmins.natcthoadon.nat-create',['nathoadon'=>$nathoadon,'natsanpham'=>$natsanpham]);
     }
     //post-----------------------------------------------------------------------------------------------------------------------------------------
     public function natCreateSubmit(Request $request)
     {
         // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
         $validate = $request->validate([
             'natHoaDonID' => 'required|exists:nat_hoa_don,id',
             'natSanPhamID' => 'required|exists:nat_san_pham,id',
             'natSoLuongMua' => 'required|numeric',  
             'natDonGiaMua' => 'required|numeric',
             'natThanhTien' => 'required|numeric',  
             'natTrangThai' => 'required|in:0,1,2',
         ]);
     
         // Tạo một bản ghi hóa đơn mới
         $natcthoadon = new nat_CT_HOA_DON;
     
         // Gán dữ liệu xác thực vào các thuộc tính của mô hình
         $natcthoadon->natHoaDonID = $request->natHoaDonID;
         $natcthoadon->natSanPhamID = $request->natSanPhamID;  
         $natcthoadon->natSoLuongMua = $request->natSoLuongMua;
         $natcthoadon->natDonGiaMua = $request->natDonGiaMua;
         $natcthoadon->natThanhTien = $request->natThanhTien;
         $natcthoadon->natTrangThai = $request->natTrangThai;
     
        
     
         // Lưu bản ghi mới vào cơ sở dữ liệu
         $natcthoadon->save();
     
         // Chuyển hướng đến danh sách hóa đơn
         return redirect()->route('natadmins.natcthoadon');
     }

      // edit-----------------------------------------------------------------------------------------------------------------------------------------
      public function natEdit($id)
{
    $nathoadon = nat_HOA_DON::all(); // Lấy tất cả các hóa đơn
    $natsanpham = nat_SAN_PHAM::all(); // Lấy tất cả các sản phẩm

    // Lấy chi tiết hóa đơn cần chỉnh sửa
    $natcthoadon = nat_CT_HOA_DON::where('id', $id)->first();

    if (!$natcthoadon) {
        // Nếu không tìm thấy chi tiết hóa đơn, chuyển hướng với thông báo lỗi
        return redirect()->route('natadmins.natcthoadon')->with('error', 'Không tìm thấy chi tiết hóa đơn!');
    }

    // Trả về view với dữ liệu
    return view('natAdmins.natcthoadon.nat-edit', [
        'nathoadon' => $nathoadon,
        'natsanpham' => $natsanpham,
        'natcthoadon' => $natcthoadon
    ]);
}

      //post-----------------------------------------------------------------------------------------------------------------------------------------
      public function natEditSubmit(Request $request,$id)
      {
          // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
          $validate = $request->validate([
              'natHoaDonID' => 'required|exists:nat_hoa_don,id',
              'natSanPhamID' => 'required|exists:nat_san_pham,id',
              'natSoLuongMua' => 'required|numeric',  
              'natDonGiaMua' => 'required|numeric',
              'natThanhTien' => 'required|numeric',  
              'natTrangThai' => 'required|in:0,1,2',
          ]);
         
      
          // Tạo một bản ghi hóa đơn mới
          $natcthoadon = nat_CT_HOA_DON::where('id', $id)->first();
      
          // Gán dữ liệu xác thực vào các thuộc tính của mô hình
          $natcthoadon->natHoaDonID = $request->natHoaDonID;
          $natcthoadon->natSanPhamID = $request->natSanPhamID;  
          $natcthoadon->natSoLuongMua = $request->natSoLuongMua;
          $natcthoadon->natDonGiaMua = $request->natDonGiaMua;
          $natcthoadon->natThanhTien = $request->natThanhTien;
          $natcthoadon->natTrangThai = $request->natTrangThai;
      
         
      
          // Lưu bản ghi mới vào cơ sở dữ liệu
          $natcthoadon->save();
      
          // Chuyển hướng đến danh sách hóa đơn
          return redirect()->route('natadmins.natcthoadon');
      }

        //delete
        public function natDelete($id)
        {
            nat_CT_HOA_DON::where('id',$id)->delete();
            return back()->with('cthoadon_deleted','Đã xóa Khách hàng thành công!');
        }
     
}