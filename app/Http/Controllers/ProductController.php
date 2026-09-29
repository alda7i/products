<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\productstorerequset;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{

    // GET all products
    public function index()
    {
        return response()->json(
            Product::all(),
            200
        );
    }



    // POST create product
    public function store(productstorerequset $request)
    {

        $product = Product::create(
            $request->validated()
        );


        return response()->json(
            $product,
            201
        );
    }




    // GET one product
    public function show($id)
    {

        $product = Product::findOrFail($id);


        return response()->json(
            $product,
            200
        );
    }




    // PUT update product
    public function update(ProductUpdateRequest $request, $id)
    {

        $product = Product::findOrFail($id);


        $product->update(
            $request->validated()
        );


        return response()->json(
            $product,
            200
        );
    }




    // DELETE product
    public function destroy($id)
    {

        $product = Product::findOrFail($id);


        $product->delete();


        return response()->json([
            'message' => 'Product deleted successfully'
        ],200);
    }

}
