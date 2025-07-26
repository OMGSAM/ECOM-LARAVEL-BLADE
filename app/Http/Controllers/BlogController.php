<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class BlogController extends Controller
{
    public function index(){

 $cartTotal = \Cart::getTotal();
         $cartCount = \Cart::getContent()->count();

        return view('frontend.contact.index',compact('cartCount' , 'cartTotal'));
    }


     
}
