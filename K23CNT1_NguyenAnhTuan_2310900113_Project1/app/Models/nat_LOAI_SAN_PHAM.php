<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NAT_LOAI_SAN_PHAM extends Model
{
    use HasFactory;
    protected $table = 'nat_loai_san_pham';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu natnhacc không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
}
