<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nat_TIN_TUC extends Model
{
    use HasFactory;
    
    protected $table = 'nat_TIN_TUC';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu natnhacc không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
}