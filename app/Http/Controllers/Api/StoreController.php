<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProdcuctImage;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    



    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'status' => 'in:available,sold',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $store = Store::create([
            'user_id' => auth()->id(),
            'product_name' => $request->product_name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                ProdcuctImage::create([
                    'store_id' => $store->id,
                    'image' => $path,
                ]);
            }
        }

        return response()->json([
            'message' => 'Product created successfully.',
            'product' => $store->load('images')
        ], 201);
    }

}
