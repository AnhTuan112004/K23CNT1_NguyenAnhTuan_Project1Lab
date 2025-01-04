<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Thêm dòng này
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class nat_KHACH_HANG extends Authenticatable // Kế thừa từ Authenticatable
{
    use HasFactory;


    protected $table = 'nat_KHACH_HANG';
    protected $primaryKey = 'natMaKhachHang'; // Đảm bảo rằng natMaKhachHang là khóa chính

    protected $fillable = [
        'natMaKhachHang', 'natHoTenKhachHang', 'natEmail', 'natMatKhau', 
        'natDienThoai', 'natDiaChi', 'natNgayDangKy', 'natTrangThai'
    ];

    public $incrementing = false; // Nếu natMaKhachHang không tự tăng thì bạn cần đặt false
    public $timestamps = true;

    protected $dates = ['natNgayDangKy'];

    public function setnatMatKhauAttribute($value)
{
    if (!empty($value)) {
        $this->attributes['natMatKhau'] = Hash::make($value);
    }
}

    
}