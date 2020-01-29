<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        Product::create(request(['title', 'description','price','thumbnail']));

        if($request->hasFile('thumbnail'))
        {
            $image = $request->file('thumbnail');
            $name = time().".".$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$name);
            $thumbnail=$name;
        }else
        {
            $thumbnail="default.png";
        }

        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);

        return view('admin.products.update', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($products) {
            $products->title = $request->title;
            $products->description = $request->description;
            $products->price = $request->price;
            $products->thumbnail = $request->thumbnail;
            $updated = $products->save();
            // Product::create(request(['title', 'description','price','thumbnail']));
            // $updated = Product::whereId($id)->update($products);
            if ($updated) {
                return redirect(route('admin.product.index'));
            } else {
                dd('not deleted');  
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function delete_data($id)
    {
        $check = Product::find($id); 
        if($check)
        {
           Product::whereId($id)->delete();
           return redirect(route('admin.product.index'));

       } else {
        dd("not delete");   
    }
}

public function cart()
{
    return view('admin.products.cart');
}
public function addToCart($id)
{
    $product = Product::find($id);

    if(!$product) {

        abort(404);

    }

    $cart = session()->get('cart');

        // if cart is empty then this the first product
    if(!$cart) {

        $cart = [
            $id => [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->photo
            ]
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

        // if cart not empty then check if this product exist then increment quantity
    if(isset($cart[$id])) {

        $cart[$id]['quantity']++;

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

        // if item not exist in cart then add to cart with quantity = 1
    $cart[$id] = [
        "name" => $product->name,
        "quantity" => 1,
        "price" => $product->price,
        "photo" => $product->photo
    ];

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart successfully!');
}
}
