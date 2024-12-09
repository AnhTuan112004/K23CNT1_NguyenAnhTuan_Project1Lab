<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class natSessincontroller extends Controller
{
    public function natgetSessionData(Request $request)
    {
        if($request->session()->has('K23CNT1_NguyenAnhTuan'))
        {
            echo "<h2> Session Data:".$request->session()->get('K23CNT1_NguyenAnhTuan');
        }
        else
        {
            echo "<h2> Không có dữ liệu trong session </h2>";
        }

    }
    public function natstoreSessionData(Request $request)
    {
        $request->session()->put('K23CNT1_NguyenAnhTuan','K23CNT1 - Nguyen Anh Tuan - 2310900113');
            echo "<h2> Dữ liệu đã được lưu và session </h2>";
    }   
    public function natdeleteSessionData(Request $request)
    {
        $request->session()->forget('K23CNT1_NguyenAnhTuan');
            echo "<h2> Dữ liệu đã được xóa khỏi session </h2>";
    }
}
