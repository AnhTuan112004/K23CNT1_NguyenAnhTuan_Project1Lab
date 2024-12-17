<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NatKhoaController extends Controller
{
    public function natGetAllKhoa()
        {
                // Truy vấn đọc dữ liệu từ bảng khoa
            $natkhoas = DB::select('select * from natkhoa ');
                return view('natkhoa.natlist',['natkhoas'=>$natkhoas]);
        }


        public function natGetKhoa($natmakh)
            {
        // Truy vấn đọc dữ liệu từ bảng khoa theo điều kiện makh
                $natkhoa = DB::select('select * from natkhoa where NATMaKH =?',[$natmakh])[0];
                    return view('natkhoa.natdetail',['natkhoa'=>$natkhoa]);
            }   
        public function natEdit($natmakh)
            {
                $natkhoa = DB::select('select * from natkhoa where NATMaKH =?',[$natmakh])[0];
                    return view('natkhoa.natedit',['natkhoa'=>$natkhoa]);
            } 
            public function natEditSubmit(Request $request)
            {
                $natmakh = $request->input('NATMAKH');
                $nattenkh = $request->input('NATTENKH');
                DB::update("UPDATE natkhoa SET NATTENKH = ? WHERE NATMAKH = ?",[$nattenkh,$natmakh]);    
                    return redirect ('/khoas');
            } 

            public function natcreate()
            {
            return view('natkhoa.natcreate');
            }
            public function natcreateSubmit(Request $request)
            {
           // Lấy dữ liệu từ form thông qua request
       $natmakh = $request->input('NATMaKH');  // Mã khoa
       $nattenkh = $request->input('NATTenKH');  // Tên khoa
   
       // Chèn dữ liệu vào bảng vtdkhoa
       DB::insert('insert into natkhoa (NATMaKH, NATTenKH) values (?, ?)', [$natmakh, $nattenkh]);
   
       // Sau khi chèn thành công, chuyển hướng về trang khoa
       return redirect('/khoas');
            }


            public function natDelete($natmakh)
            {
                $natkhoa = DB::select('select * from natkhoa where NATMaKH =?',[$natmakh])[0];
                    return view('natkhoa.natdelete',['natkhoa'=>$natkhoa]);
            } 
            public function natDeleteSubmit(Request $request)
            {
                $natmakh = $request->input('NATMAKH');
               
                DB::DELETE("DELETE From natkhoa WHERE NATMaKH = ?",[$natmakh]);    
                    return redirect ('/khoas');
            } 
}
