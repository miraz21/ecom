<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function view()
   {
    return view('admin.home');
   }
}
