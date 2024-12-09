<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class natAccountController extends Controller
{
    public function natLogin(){
        return view("nat-login");
    }

    public function natLoginSubmit(Request $REQUEST)
    {
        $validation =  $REQUEST->validate([
            'natemail' => 'required|email',
            'natpass'  => 'required|min:6'
        ]);
        $natemail = $REQUEST->input('natemail');
        $natpass = $REQUEST->input('natpass');

        $natloginSession = [
            'natemail'=>$natemail,
            'natpass'=>$natpass
        ];
        $nat_json = json_encode( $natloginSession);
        if($natemail == 'nat@gmail.com' && $natpass == '123456a@')
        {
            $REQUEST->session()->put('K23CNT1-NguyenAnhTuan',$natemail);
            return redirect('/');
        }
        return redirect()->back()->with('nat-error', 'your message,here');
    }

    public function natdeleteSessionData(Request $request)
    {
        $request->session()->forget('K23CNT1-NguyenAnhTuan');
           return redirect('/');
    }
}
