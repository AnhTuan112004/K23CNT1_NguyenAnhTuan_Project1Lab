<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nat_SAN_PHAM; 
use App\Models\nat_LOAI_SAN_PHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
use Illuminate\Support\Facades\Storage;  // Use this for file handling
class nat_SAN_PHAMController extends Controller
{


    
    // In your controller
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = nat_SAN_PHAM::where('natTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = nat_SAN_PHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('natuser.search', compact('products', 'search'));
    }

    public function search1(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = nat_SAN_PHAM::where('natTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = nat_SAN_PHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('natuser.search1', compact('products', 'search'));
    }


    // search sap pham admin
    public function searchAdmins(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = nat_SAN_PHAM::where('natTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = nat_SAN_PHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('natAdmins.natsanpham.nat-search', compact('products', 'search'));
    }

     //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function natList()
{


    // Apply pagination and filter by natTrangThai
    $natsanphams = nat_SAN_PHAM::where('natTrangThai', 0); 
                   // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
     $natsanphams = nat_SAN_PHAM::paginate(5);    
    
    // Pass the paginated products to the view
    return view('natAdmins.natsanpham.nat-list', ['natsanphams' => $natsanphams]);
}

    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function natDetail($id)
    {
        // Tìm sản phẩm theo ID
        $natsanpham = nat_SAN_PHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('natAdmins.natsanpham.nat-detail', ['natsanpham' => $natsanpham]);
    }

      //create  -----------------------------------------------------------------------------------------------------------------------------------------
      public function natCreate()
      {
            // đọc dữ liệu từ nat_LOAI_SAN_PHAM
            $natloaisanpham = nat_LOAI_SAN_PHAM::all();
          return view('natAdmins.natsanpham.nat-create',['natloaisanpham'=>$natloaisanpham]);
      }
     

     // Controller
public function natCreateSubmit(Request $request)
{

    // Validate input
    $validatedData = $request->validate([
        'natMaSanPham' => 'required|unique:nat_SAN_PHAM,natMaSanPham',
        'natTenSanPham' => 'required|string|max:255',
        'natHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'natSoLuong' => 'required|numeric|min:1',
        'natDonGia' => 'required|numeric',
        'natMaLoai' => 'required|exists:nat_LOAI_SAN_PHAM,id',
        'natTrangThai' => 'required|in:0,1',
    ]);

    // Khởi tạo đối tượng nat_SAN_PHAM và lưu thông tin vào cơ sở dữ liệu
    $natsanpham = new nat_SAN_PHAM;
    $natsanpham->natMaSanPham = $request->natMaSanPham;
    $natsanpham->natTenSanPham = $request->natTenSanPham;

    // Kiểm tra nếu có tệp hình ảnh
    if ($request->hasFile('natHinhAnh')) {
        // Lấy tệp hình ảnh
        $file = $request->file('natHinhAnh');

        // Kiểm tra nếu tệp hợp lệ
        if ($file->isValid()) {
            // Tạo tên tệp dựa trên mã sản phẩm
            $fileName = $request->natMaSanPham . '.' . $file->extension();

            // Lưu tệp vào thư mục public/img/san_pham
            $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

            // Lưu đường dẫn vào cơ sở dữ liệu
            $natsanpham->natHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $natsanpham->natSoLuong = $request->natSoLuong;
    $natsanpham->natDonGia = $request->natDonGia;
    $natsanpham->natMaLoai = $request->natMaLoai;
    $natsanpham->natTrangThai = $request->natTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $natsanpham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('natadims.natsanpham');
}

//delete    -----------------------------------------------------------------------------------------------------------------------------------------

public function natdelete($id)
{
    nat_SAN_PHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}

// edit -----------------------------------------------------------------------------------------------------------------------------------------
public function natEdit($id)
    {
       // Tìm sản phẩm theo ID
    $natsanpham = nat_SAN_PHAM::findOrFail($id);

    // Lấy tất cả các loại sản phẩm từ bảng nat_LOAI_SAN_PHAM
    $natloaisanpham = nat_LOAI_SAN_PHAM::all();

    // Trả về view với dữ liệu sản phẩm và loại sản phẩm
    return view('natAdmins.natsanpham.nat-edit', [
        'natsanpham' => $natsanpham,
        'natloaisanpham' => $natloaisanpham
    ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm


    public function natEditSubmit(Request $request, $id)
{
    // Validate dữ liệu
    $request->validate([
        'natMaSanPham' => 'required|max:20',
        'natTenSanPham' => 'required|max:255',
        'natHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'natSoLuong' => 'required|integer',
        'natDonGia' => 'required|numeric',
        'natMaLoai' => 'required|max:10',
        'natTrangThai' => 'required|in:0,1',
    ]);

    // Tìm sản phẩm cần chỉnh sửa
    $natsanpham = nat_SAN_PHAM::findOrFail($id);

    // Cập nhật thông tin sản phẩm
    $natsanpham->natMaSanPham = $request->natMaSanPham;
    $natsanpham->natTenSanPham = $request->natTenSanPham;
    $natsanpham->natSoLuong = $request->natSoLuong;
    $natsanpham->natDonGia = $request->natDonGia;
    $natsanpham->natMaLoai = $request->natMaLoai;
    $natsanpham->natTrangThai = $request->natTrangThai;

    // Kiểm tra nếu có hình ảnh mới
    if ($request->hasFile('natHinhAnh')) {
        // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
        if ($natsanpham->natHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $natsanpham->natHinhAnh)) {
            // Xóa file cũ nếu tồn tại
            Storage::disk('public')->delete('img/san_pham/' . $natsanpham->natHinhAnh);
        }
        // Lưu hình ảnh mới
        $imagePath = $request->file('natHinhAnh')->store('img/san_pham', 'public');
        $natsanpham->natHinhAnh = $imagePath;
    }

    // Lưu thông tin sản phẩm đã chỉnh sửa
    $natsanpham->save();

    // Redirect về trang danh sách sản phẩm
    return redirect()->route('natadims.natsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}

    

}