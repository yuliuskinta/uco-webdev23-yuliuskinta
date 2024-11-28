<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = array(
            [
                'id' => 'boat',
                'name' => 'Boat',
                'price' => 2000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, dolore ipsam placeat quia recusandae modi corrupti fuga commodi et vero sit voluptatum similique eum nisi aspernatur officia provident! Laborum, in!',
                'image' => 'https://fastly.picsum.photos/id/469/200/200.jpg?hmac=r_nEPJ5ExnhVEQSrNc19WUPConxJzBC929FJHl_Y5N4'
            ],
            [
                'id' => 'tea',
                'name' => 'Tea',
                'price' => 5000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, dolore ipsam placeat quia recusandae modi corrupti fuga commodi et vero sit voluptatum similique eum nisi aspernatur officia provident! Laborum, in!',
                'image' => 'https://fastly.picsum.photos/id/365/200/200.jpg?hmac=1d3GDxGN6ctXX3y8q4PA_hKu6fLOCEGbgeKZKJ8K8U8'
            ],
            [
                'id' => 'train',
                'name' => 'Train',
                'price' => 500000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, dolore ipsam placeat quia recusandae modi corrupti fuga commodi et vero sit voluptatum similique eum nisi aspernatur officia provident! Laborum, in!',
                'image' => 'https://fastly.picsum.photos/id/419/200/200.jpg?hmac=yUYGIG3hJhzafcgOl8Drs4iTsia3HynizHXh8nTcvEQ'
            ],
            [
                'id' => 'train',
                'name' => 'Train',
                'price' => 500000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, dolore ipsam placeat quia recusandae modi corrupti fuga commodi et vero sit voluptatum similique eum nisi aspernatur officia provident! Laborum, in!',
                'image' => 'https://fastly.picsum.photos/id/419/200/200.jpg?hmac=yUYGIG3hJhzafcgOl8Drs4iTsia3HynizHXh8nTcvEQ'
            ],
            [
                'id' => 'train',
                'name' => 'Train',
                'price' => 500000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, dolore ipsam placeat quia recusandae modi corrupti fuga commodi et vero sit voluptatum similique eum nisi aspernatur officia provident! Laborum, in!',
                'image' => 'https://fastly.picsum.photos/id/419/200/200.jpg?hmac=yUYGIG3hJhzafcgOl8Drs4iTsia3HynizHXh8nTcvEQ'
            ]
        );

        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.form', [
            'title' => 'Add new product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
