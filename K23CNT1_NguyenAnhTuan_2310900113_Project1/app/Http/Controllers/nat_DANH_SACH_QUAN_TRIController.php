<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\nat_SAN_PHAM; 
use App\Models\nat_KHACH_HANG; 
use App\Models\nat_TIN_TUC; 
class nat_DANH_SACH_QUAN_TRIController extends Controller
{
    //
        // Danh mục
        public function danhmuc()
        {
            // Truy vấn số lượng sản phẩm
            $productCount = nat_SAN_PHAM::count();
        
            // Truy vấn số lượng người dùng
            $userCount = nat_KHACH_HANG::count();
            $ttCount = nat_TIN_TUC::count();

        
            // Trả về view và truyền cả productCount và userCount
            return view('natAdmins.natdanhsachquantri.natdanhmuc', compact('productCount', 'userCount','ttCount'));
        }

        public function nguoidung()
        {
            $natnguoidung = nat_KHACH_HANG::all();
        
            // Chuyển đổi natNgayDangKy thành đối tượng Carbon thủ công
            foreach ($natnguoidung as $user) {
                // Chuyển đổi ngày tháng thành đối tượng Carbon nếu chưa phải là Carbon
                $user->natNgayDangKy = Carbon::parse($user->natNgayDangKy);
            }
        
            return view('natAdmins.natdanhsachquantri.natdanhmuc.natnguoidung', ['natnguoidung' => $natnguoidung]);
        }
        

        public function tintuc()
        {
            // Retrieve all news articles from the database (assuming you have a model named nat_TIN_TUC)
            $nattintucs = nat_TIN_TUC::all();  // Fetching all articles
        
            // Loop through articles and add the full URL to the image
            foreach ($nattintucs as $article) {
                // Assuming natHinhAnh stores the image name, we'll prepend the 'public/storage' path
                $article->image_url = asset('storage/' . $article->natHinhAnh);
            }
        
            // Return the view and pass the articles to it
            return view('natAdmins.natdanhsachquantri.natdanhmuc.nattintuc', [
                'nattintucs' => $nattintucs, // Passing the news articles to the view
            ]);
        }
        
    

    // Hiển thị danh sách sản phẩm
    public function sanpham()
    {
        $natsanphams = nat_SAN_PHAM::all(); // Lấy tất cả sản phẩm
        return view('natAdmins.natdanhsachquantri.natdanhmuc.natsanpham', ['natsanphams' => $natsanphams]);
    }

    // Hiển thị mô tả chi tiết sản phẩm
    public function mota($id)
    {
        // Lấy sản phẩm theo id
        $product = nat_SAN_PHAM::find($id);
        
        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            return redirect()->route('natAdmins.natdanhsachquantri.danhmuc.sanpham')
                             ->with('error', 'Sản phẩm không tồn tại.');
        }

        // Trả về view với thông tin sản phẩm
        return view('natAdmins.natdanhsachquantri.natdanhmuc.natmota', ['product' => $product]);
    }
}