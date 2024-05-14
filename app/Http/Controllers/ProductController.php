<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view ('product');
    }
}
