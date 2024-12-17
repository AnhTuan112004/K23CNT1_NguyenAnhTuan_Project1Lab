<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class natAccountController extends Controller
{
    //
    public function index()
        {
            return "<h1> natAccount Controller; action index; return string";
        }
        public function create()
        {
            return view('nataccount-create');
        }
        public function showData()
        {

        $data = array('220012345','Devmaster');
        return view('account-show',compact('data'));
        }
        public function list(){
            // dữ liệu
            $data = array(
            ["id"=>1,"UserName"=>"ChungTrinh","Password"=>"123456a@","FullName"=>"T
            
            rịnh Văn Chung"],
            
            ["id"=>2,"UserName"=>"Devmaster","Password"=>"123456a@","FullName"=>"De
            
            vmaster Academy"]
            );
            // Trả về view và data
            return view('account-list',compact('data'));
            }
}
