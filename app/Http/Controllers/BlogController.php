<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class BlogController extends Controller
{
    public function index(){

        $cartCount = 0;
        
$cartTotal=0;


        return view('frontend.contact.index',compact('cartCount' , 'cartTotal'));
    }


     
}
