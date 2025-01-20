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

    public function showTestimonials()
    {
        $testimonials = [
            (object) ['name' => 'John Doe', 'message' => 'Great service!'],
            (object) ['name' => 'Jane Smith', 'message' => 'Loved the products!'],
            (object) ['name' => 'Alice Johnson', 'message' => 'Will definitely buy again!'],
            (object) ['name' => 'Bob Brown', 'message' => 'Highly recommend!'],
            (object) ['name' => 'Charlie Davis', 'message' => 'Fantastic experience!'],
            (object) ['name' => 'Eve White', 'message' => 'Very satisfied!'],
            (object) ['name' => 'Frank Black', 'message' => 'Excellent quality!'],
            (object) ['name' => 'Grace Green', 'message' => 'Fast shipping!'],
            (object) ['name' => 'Hank Blue', 'message' => 'Great customer support!'],
            (object) ['name' => 'Ivy Red', 'message' => 'Will recommend to friends!'],
        ];

        return view('home.testimoni', ['testimonials' => $testimonials]);
    }
}
