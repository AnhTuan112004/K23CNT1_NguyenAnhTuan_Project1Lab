<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nat_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'nat_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'natMaHoaDon',  // Thêm trường natMaHoaDon vào mảng fillable
        'natMaKhachHang',
        'natNgayHoaDon',
        'natNgayNhan',
        'natHoTenKhachHang',
        'natEmail',
        'natDienThoai',
        'natDiaChi',
        'natTongGiaTri',
        'natTrangThai',
    ];

    // Quan hệ với bảng nat_KHACH_HANG
    public function khachHang()
    {
        return $this->belongsTo(nat_KHACH_HANG::class, 'natMaKhachHang', 'id');
    }

    // Quan hệ với bảng nat_CT_HOA_DON
    public function chiTietHoaDon()
    {
        return $this->hasMany(nat_CT_HOA_DON::class, 'natHoaDonID', 'id');
    }
    
}