<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class natnhacc extends Model
{
    use HasFactory;
    protected $table = "natnhacc"; // tên bảng
    protected $primaryKey = 'natMaNCC'; // Đặt khóa chính
    public $incrementing = false; // Nếu vtdnhacc không phải là auto-increment
    public $timestamps = false;
    
}
