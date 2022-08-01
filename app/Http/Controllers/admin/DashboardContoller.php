<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    public function dashboard(){
        return view('admin/dashboard');
    }
    public function htmlEditor(){
        return view('admin/html-editor');
    }
}
