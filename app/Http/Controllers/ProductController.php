<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\View\View;

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
                'id' => 'car',
                'name' => 'Car',
                'price' => 300000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/268/200/200.jpg?hmac=I5JAWzISJc5x0jlDhEngvCIwyM0zxRh22iIIzHqOT80'
            ],
            [
                'id' => 'bicycle',
                'name' => 'Bicycle',
                'price' => 15000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/213/200/200.jpg?hmac=Jzh2fbzIE1nc6J8qLi_ljVCRz0AITXxCC1Z8t2sD4jU'
            ],
            [
                'id' => 'motorcycle',
                'name' => 'Motorcycle',
                'price' => 80000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/168/200/200.jpg?hmac=VxnpUGg87Q47YRONmdsU2vNGSPjCs5vrwiAL-0hEIHM'
            ],
            [
                'id' => 'bus',
                'name' => 'Bus',
                'price' => 1200000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/383/200/200.jpg?hmac=rXabQJHkUdhkZ467kU2O2mFC-ZufkuYob-xSiZEbNWc'
            ],
            [
                'id' => 'truck',
                'name' => 'Truck',
                'price' => 700000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/859/200/200.jpg?hmac=vEU-8IgIt_Q7UmUqqkedPnQX0g_C-6w4WPB2VHTzfgg'
            ],
            [
                'id' => 'airplane',
                'name' => 'Airplane',
                'price' => 20000000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/877/200/200.jpg?hmac=_TafLl6WZhZyakFIYbCsHjkQbQ_aQreI80z-xcPFQIg'
            ],
            [
                'id' => 'boat',
                'name' => 'Boat',
                'price' => 500000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/579/200/200.jpg?hmac=23fWj_34nrlHUFFsNp_a49abuuXPMHAqJt_DAj3ARPQ'
            ],
            [
                'id' => 'helicopter',
                'name' => 'Helicopter',
                'price' => 15000000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/654/200/200.jpg?hmac=oeNFLFRnWkWWnkuzoPKkwuIXUfPbCtvjpOq09MC1DrM'
            ],
            [
                'id' => 'scooter',
                'name' => 'Scooter',
                'price' => 30000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/57/200/200.jpg?hmac=EAluVy04ceTUijEPw3vraS5dkJ6vtBD3HmNwvMI5f3k'
            ],
            [
                'id' => 'van',
                'name' => 'Van',
                'price' => 400000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/929/200/200.jpg?hmac=V-NHF1GoUllni1jU8FFUECP1jZUGTYZRxwTT-OkI9Fw'
            ],
            [
                'id' => 'submarine',
                'name' => 'Submarine',
                'price' => 10000000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/544/200/200.jpg?hmac=iIsE7MkJ1i0DzyQjD7hXFjiVpz8uukzJTk9XCNuWS8c'
            ],
            [
                'id' => 'train_car',
                'name' => 'Train Car',
                'price' => 250000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/385/200/200.jpg?hmac=dLlnX_YjZRYLV8lZ45w0UOuKuI1MiXWjEw5DZMnKNbg'
            ],
            [
                'id' => 'y acht',
                'name' => 'Yacht',
                'price' => 8000000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/660/200/200.jpg?hmac=5UOdBCKDcPq_zS0RAVkvSD934EYVyCEdExCagJur-g8'
            ],
            [
                'id' => 'trailer',
                'name' => 'Trailer',
                'price' => 600000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/237/200/200.jpg?hmac=zHUGikXUDyLCCmvyww1izLK3R3k8oRYBRiTizZEdyfI'
            ],
            [
                'id' => 'hovercraft',
                'name' => 'Hovercraft',
                'price' => 3000000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/51/200/200.jpg?hmac=AxDMciMBjL8UIKzxl80paiBUywP7elWptqQW_qTq8vw'
            ],
            [
                'id' => 'monorail',
                'name' => 'Monorail',
                'price' => 1500000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/147/200/200.jpg?hmac=Wk9sBW0wWCdCCp0HIczINX1TUZ_paAR_tCIKXcuYf2k'
            ],
            [
                'id' => 'trolleybus',
                'name' => 'Trolleybus',
                'price' => 900000000,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, voluptatum?',
                'image' => 'https://fastly.picsum.photos/id/501/200/200.jpg?hmac=tKXe69j4tHhkAA_Qc3XinkTuubEWwkFVhA9TR4TmCG8'
            ]
        );
        return view('products.index',[
            'data' => $products
        ]);
    }

    public function form()
    {
        return view('products.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('products.form');
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
