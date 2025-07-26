<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $x=Order::all();
        $y=Product::all();
        $z=User::all();
        return view('admin.Dashboard',compact('x','y','z'));
    }
}
