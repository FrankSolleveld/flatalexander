<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Product;
Use App\User;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        $products = Product::all();

        return view ('admin.content', compact('products'));
    }

    public function userShow(){
        $users = User::all();

        return view ('admin.users', compact('users'));
    }
}
