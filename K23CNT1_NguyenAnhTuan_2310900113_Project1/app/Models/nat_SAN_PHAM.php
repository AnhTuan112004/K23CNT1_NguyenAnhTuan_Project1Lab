<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nat_SAN_PHAM extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
   
    protected $table = 'nat_SAN_PHAM';
    protected $primaryKey = 'id';
    public $timestamps = true;

    
    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'natMaSanPham',
        'natTenSanPham',
        'natHinhAnh',
        'natSoLuong',
        'natDonGia',
        'natMaLoai',
        'natMoTa',
        'natTrangThai',
    ];
    public function chiTietHoaDon()
    {
        return $this->hasMany(nat_CT_HOA_DON::class, 'natSanPhamID','id');
    }
   

}