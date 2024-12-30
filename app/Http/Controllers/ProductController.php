<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::select();
        $searchQueries = [];

        $sortOptions = [
            'name_asc' => 'Name A-Z',
            'name_desc' => 'Name Z-A',
            'price_asc' => 'Lowest price',
            'price_desc' => 'Highest price'
        ];

        if ($request->category) {
            $products->where('category_id', $request->category);
            $category = Category::where('id', $request->category)->first();
            if ($category) {
                $searchQueries[] = $category->name;
            }
        }

        if ($request->search) {
            $products->where(function($query) use ($request) {
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%');
            });

            $searchQueries[] = '"'.$request->search.'"';
        }

        if ($request->priceFrom) {
            $products->where('price', '>=', $request->priceFrom);
        }

        if ($request->priceTo) {
            $products->where('price', '<=', $request->priceTo);
        }

        if ($request->sort) {
            [$sortColumn, $sortDirection] = explode('_', $request->sort);
            $products->orderBy($sortColumn, $sortDirection ?? 'asc');
        } else {
            $products->orderBy('name', 'asc');
        }

        // $products = $products->get();

        $products = $products->paginate(12)->withQueryString();

        return view('products.index', [
            'products' => $products,
            'searchQueries' => $searchQueries,
            'sortOptions' => $sortOptions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Otomatis memberikan exception jika tidak memiliki akses
        Gate::authorize('is-admin');

        // Cara manual
        // if (! Gate::allows('is-admin')) {
        //     abort(403);
        // }


        $categories = Category::getOrdered();
        return view('products.form', [
            'title' => 'Add new product',
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('is-admin');
        $request->validate([
            'name' => ['required', 'max:255', Rule::unique('products')],
            'description' => ['string'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', Rule::in(Category::getOrdered()->pluck('id'))]
        ]);

        try {
            DB::beginTransaction();

            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id
            ]);

            $this->uploadFile($request, $product);

            DB::commit();
            return redirect()->route('products.show', ['id' => $product->id])
                ->withSuccess('New product has been added!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors([
                'alert' => 'Failed to add new product'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return view('products.show', [
            'product' => $request->product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $categories = Category::getOrdered();
        return view('products.form', [
            'title' => 'Edit product',
            'product' => $request->product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', Rule::unique('products')->ignore($request->product->id)],
            'description' => ['string'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', Rule::in(Category::getOrdered()->pluck('id'))],
            'image' => [File::image()->max('2mb')]
        ]);

        try {
            DB::transaction(function () use ($request) {
                $request->product->name = $request->name;
                $request->product->description = $request->description;
                $request->product->price = $request->price;
                $request->product->category_id = $request->category_id;
                $request->product->save();

                $this->uploadFile($request, $request->product);
            });

            return redirect()->route('products.show', ['id' => $request->product->id])
                ->withSuccess('Product has been edited');
        } catch (\Exception $e) {
            return back()->withErrors([
                'alert' => 'Failed to edit product'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->product->delete();

        return redirect()->route('products.list');
    }

    private function uploadFile(Request $request, Product $product) {
        if ($request->file('image')) {
            /* Menyimpan file ke folder sesuai dengan FILESYSTEM_DRIVER .env dengan nama random */
            $path = $request->file('image')->store('products');

            /* Menyimpan file ke folder sesuai dengan FILESYSTEM_DRIVER .env dengan nama yang sudah ditentukan */
            $extension = $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('products', $product->id.'.'.$extension);

            $product->image = 'storage/'.$path;
            return $product->save();
        }

        return false;
    }
}
