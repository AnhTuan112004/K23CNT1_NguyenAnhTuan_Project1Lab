<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class view4 extends Controller
{
    public function view4()
{
return view('view4')
->with('name', 'Anh Tuan')
->with('company', 'Devmaster Academy');;

}
}
