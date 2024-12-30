<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $newArrival = Product::orderBy('created_at')->limit(4)->get();
        return view('home.index', [
            'newArrival' => $newArrival
        ]);
    }
}
