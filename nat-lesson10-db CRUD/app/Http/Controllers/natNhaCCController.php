<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\natnhacc;
class natNhaCCController extends Controller
{
    //
    // tạo list
    public function natlist()
    {
        $natnhacc=natnhacc::all();
           // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
           $natnhacc = natnhacc::paginate(10);
        return view('natnhacc.list',['natnhacc'=>$natnhacc]);
    }
    // detail
    public function natdetail($manhacc)
    {
        $natnhacc=natnhacc::where('natMaNCC',$manhacc)->first();
        return view('natnhacc.detail',['natnhacc'=>$natnhacc]);
    }

     // Sửa thông tin Nhà Cung Cấp
     public function natedit($manhacc) {
        // Tìm Nhà Cung Cấp theo mã Nhà Cung Cấp (natMaNCC)
        $natnhacc = natnhacc::where('natMaNCC', $manhacc)->first();
        
       
        // Trả về view sửa thông tin Nhà Cung Cấp với dữ liệu tìm được
        return view('natnhacc.edit', ['natnhacc' => $natnhacc]);
    }
    
    // Xử lý cập nhật thông tin Nhà Cung Cấp
    public function nateditsubmit(Request $request, $manhacc) {
        // Kiểm tra và xác thực dữ liệu gửi lên
        $validatedData = $request->validate([
            'tenncc' => 'required|string|max:255',   // Kiểm tra 'tenncc' phải có giá trị, là chuỗi và có độ dài tối đa 255 ký tự
            'diachi' => 'required|string|max:255',   // Tương tự với 'diachi'
            'dienthoai' => 'required|string|max:20', // Kiểm tra 'dienthoai' phải là chuỗi và không vượt quá 20 ký tự
            'status' => 'required|string|max:50',    // 'status' phải có giá trị, là chuỗi và có độ dài tối đa 50 ký tự
            'email' => 'required|email|max:255',     // 'email' phải là định dạng email hợp lệ và có độ dài tối đa 255 ký tự
        ]);

        // Tìm Nhà Cung Cấp theo mã Nhà Cung Cấp (natMaNCC)
        $natnhacc = natnhacc::where('natMaNCC', $manhacc)->first();
        
    

        // Cập nhật các thông tin Nhà Cung Cấp từ dữ liệu đã xác thực
        $natnhacc->natTenNCC = $request->tenncc;
        $natnhacc->natDiachi = $request->diachi;
        $natnhacc->natDienthoai = $request->dienthoai;
        $natnhacc->natstatus = $request->status;
        $natnhacc->natemail = $request->email;
    
        // Lưu lại thông tin đã cập nhật vào cơ sở dữ liệu
        $natnhacc->save();
    
        // Chuyển hướng về trang danh sách và hiển thị thông báo thành công
        return redirect('/natnhacc')->with('success', 'Thông tin nhà cung cấp đã được cập nhật.');
    }
     //create
     public function natcreate()
     {
         // Trả về view form thêm mới
         return view('natnhacc.create');
     }
 
     // Xử lý lưu thông tin nhà cung cấp mới
     public function natcreatesubmit(Request $request)
     {
         // Xác thực dữ liệu gửi lên
         $validatedData = $request->validate([
             'mancc' => 'required|string|max:20|unique:natnhacc,natMaNCC', // Validate Mã Nhà Cung Cấp (tùy chỉnh)
             'tenncc' => 'required|string|max:255',
             'diachi' => 'required|string|max:255',
             'dienthoai' => 'required|string|max:20',
             'status' => 'required|string|max:50',
             'email' => 'required|email|max:255',
         ]);
     
         // Tạo mới nhà cung cấp
         $natnhacc = new natNhaCC();
         $natnhacc->natMaNCC = $request->mancc; // Gán Mã Nhà Cung Cấp
         $natnhacc->natTenNCC = $request->tenncc;
         $natnhacc->natDiachi = $request->diachi;
         $natnhacc->natDienthoai = $request->dienthoai;
         $natnhacc->natstatus = $request->status;
         $natnhacc->natemail = $request->email;
     
         // Lưu thông tin mới
         $natnhacc->save();
     
         // Chuyển hướng về trang danh sách với thông báo thành công
         return redirect('/natnhacc')->with('success', 'Nhà cung cấp mới đã được thêm.');
     }
     // delete
     public function natdelete($manhacc)
     {
     natNhaCC::where('natMaNCC',$manhacc)->delete();
     return back()->with('nhacc_deleted','Đã xóa sinh viên thành công!');
     }
}
