<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nat_LOAI_SAN_PHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
class nat_LOAI_SAN_PHAMController extends Controller
{
    //admin CRUD
    // list
    public function natList()
    {
        $natloaisanphams = nat_LOAI_SAN_PHAM::all();
        return view('natAdmins.natloaisanpham.nat-list',['natloaisanphams'=>$natloaisanphams]);
    }

    //create
    public function natCreate()
    {
        return view('natAdmins.natloaisanpham.nat-create');
    }

    public function natCreateSunmit(Request $request)
    {
        $validatedData = $request->validate([
            'natMaLoai' => 'required|unique:nat_LOAI_SAN_PHAM,natMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'natTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'natTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);
        //ghi dữ liệu xuống db
        $natloaisanpham = new nat_LOAI_SAN_PHAM;
        $natloaisanpham->natMaLoai = $request->natMaLoai;
        $natloaisanpham->natTenLoai = $request->natTenLoai;
        $natloaisanpham->natTrangThai = $request->natTrangThai;

        $natloaisanpham->save();
       return redirect()->route('natadmins.natloaisanpham');
    }

    public function natEdit($id)
    {
        // Retrieve the product by the primary key (id)
        $natloaisanpham = nat_LOAI_SAN_PHAM::find($id);
    
        // If the product does not exist, redirect with an error message
        if (!$natloaisanpham) {
            return redirect()->route('natadmins.natloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Pass the product data to the edit view
        return view('natAdmins.natloaisanpham.nat-edit', ['natloaisanpham' => $natloaisanpham]);
    }
    
    public function natEditSubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'natMaLoai' => 'required|string|max:255|unique:nat_LOAI_SAN_PHAM,natMaLoai,' . $request->id,  // Bỏ qua natMaLoai của bản ghi hiện tại
            'natTenLoai' => 'required|string|max:255',   
            'natTrangThai' => 'required|in:0,1',  // Validation for natTrangThai (0 or 1)
        ]);
    
        // Find the product by id
        $natloaisanpham = nat_LOAI_SAN_PHAM::find($request->id);
    
        // Check if the product exists
        if (!$natloaisanpham) {
            return redirect()->route('natadmins.natloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Update the product with validated data
        $natloaisanpham->natMaLoai = $request->natMaLoai;
        $natloaisanpham->natTenLoai = $request->natTenLoai;
        $natloaisanpham->natTrangThai = $request->natTrangThai;
    
        // Save the updated product
        $natloaisanpham->save();
    
        // Redirect back to the list page with a success message
        return redirect()->route('natadmins.natloaisanpham')->with('success', 'Cập nhật loại sản phẩm thành công.');
    }
    
    

    public function natGetDetail($id)
    {
        $natloaisanpham = nat_LOAI_SAN_PHAM::where('id', $id)->first();
        return view('natAdmins.natloaisanpham.nat-detail',['natloaisanpham'=>$natloaisanpham]);

    }

    public function natDelete($id)
    {
        nat_LOAI_SAN_PHAM::where('id',$id)->delete();
    return back()->with('loaisanpham_deleted','Đã xóa Loại Sản Phẩm thành công!');
    }

}