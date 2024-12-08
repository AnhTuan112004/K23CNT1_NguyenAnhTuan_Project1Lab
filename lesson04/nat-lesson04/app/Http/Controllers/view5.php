<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View; 

use Illuminate\Http\Request;

class view5 extends Controller
{
    public function view5()
{
// dữ liệu
$info = "VIỆN CÔNG NGHỆ VÀ ĐÀO TẠO DEVMASTER";
$emp = array(
"Name"=>"Nguyen Anh Tuan",
"Email"=>"anhtuanj@gmail.com",
"Phone"=>"0978611889",
);
if(View::exists('view5')){
return view('view5',compact('info','emp'));
}else{
return "Không tồn tại view5";
}
}
}
