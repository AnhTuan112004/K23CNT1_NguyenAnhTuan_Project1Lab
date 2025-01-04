<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nat_KHACH_HANG;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class nat_SIGNUPController extends Controller
{
    // Show the form to create a new customer
    public function natsignup()
    {
        return view('natuser.signup');
    }

    // Handle the form submission and store customer data
    public function natsignupSubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'natHoTenKhachHang' => 'required|string|max:255',
            'natEmail' => 'required|email|unique:nat_khach_hang,natEmail',
            'natMatKhau' => 'required|min:6',
            'natDienThoai' => 'required|numeric|unique:nat_khach_hang,natDienThoai',
            'natDiaChi' => 'required|string|max:255',
        ]);

        // Generate a new customer ID (natMaKhachHang)
        $lastCustomer = nat_KHACH_HANG::latest('natMaKhachHang')->first(); // Get the latest customer to determine the next ID
    
        // If no customers exist, start with KH001
        if ($lastCustomer) {
            $newCustomerID = 'KH' . str_pad((substr($lastCustomer->natMaKhachHang, 2) + 1), 3, '0', STR_PAD_LEFT);  // e.g., KH001, KH002, etc.
        } else {
            $newCustomerID = 'KH001'; // First customer will be KH001
        }
    
        // Create a new customer record
        $natkhachhang = new nat_KHACH_HANG;
        $natkhachhang->natMaKhachHang = $newCustomerID; // Automatically generated ID
        $natkhachhang->natHoTenKhachHang = $request->natHoTenKhachHang;
        $natkhachhang->natEmail = $request->natEmail;
        $natkhachhang->natMatKhau = $request->natMatKhau; // Encrypt the password
        $natkhachhang->natDienThoai = $request->natDienThoai;
        $natkhachhang->natDiaChi = $request->natDiaChi;
        $natkhachhang->natNgayDangKy = now(); // Set the current timestamp for registration date
        $natkhachhang->natTrangThai = 0; // Set the default value for natTrangThai to 0 (inactive or unverified)
    
        // Save the new customer data
        try {
            $natkhachhang->save();
            // Redirect to login page on success with a success message
            return redirect()->route('natuser.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
        } catch (\Exception $e) {
            // In case of error, return to the previous page with an error message
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}