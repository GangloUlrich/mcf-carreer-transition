<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ScholarController extends Controller
{
    public  function scholars(){
        $scholars = User::where('type','=','user')->get();

        return view('admin.scholars.index',['scholars' => $scholars]);
    }
}
