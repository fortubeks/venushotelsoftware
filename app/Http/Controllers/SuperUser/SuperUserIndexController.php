<?php

namespace App\Http\Controllers\SuperUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperUserIndexController extends Controller
{
    //
    public function dashboard(){
        return view('super_user.index');
    }
}
