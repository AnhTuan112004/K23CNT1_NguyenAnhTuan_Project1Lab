<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nat_QUAN_TRI extends Model
{
    use HasFactory;

    // Chỉ định bảng của model nếu tên bảng khác tên mặc định
    protected $table = 'nat_QUAN_TRI';

    // Chỉ định các cột có thể gán (mass assignable)
    protected $fillable = ['natTaiKhoan', 'natMatKhau', 'natTrangThai'];

    // Tắt timestamp nếu không cần thiết (nếu bảng không có created_at và updated_at)
    public $timestamps = false;
}
