<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nat_CT_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'nat_CT_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
       'natHoaDonID',   // Đảm bảo có trường natHoaDonID ở đây
        'natSanPhamID',
        'natSoLuongMua',
        'natDonGiaMua',
        'natThanhTien',
        'natTrangThai',
    ];

    // Quan hệ giữa bảng nat_CT_HOA_DON và bảng nat_SAN_PHAM
 // Quan hệ với bảng nat_HOA_DON
public function hoaDon()
{
    return $this->belongsTo(nat_HOA_DON::class, 'natHoaDonID', 'id');
}

// Quan hệ với bảng nat_SAN_PHAM
public function sanPham()
{
    return $this->belongsTo(nat_SAN_PHAM::class, 'natSanPhamID', 'id');
}

}