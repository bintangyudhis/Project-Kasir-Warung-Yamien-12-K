<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        $quantityInCart = $cart[$product->id]['quantity'] ?? 0;

        $quantityRequested = $quantityInCart + 1;


        if ($product->stock_quantity < $quantityRequested) {
            return redirect()->back()->with('error', "Stok $product->name tidak cukup! (Sisa $product->stock_quantity");
        }


        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity'] = $quantityRequested;
        }else {
            $cart[$product->id]=[
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'photo' => $product->photo
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambah ke keranjang!');
    }

    public function update(Request $request, $productId)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $product = Product::find($productId);
        $cart = session()->get('cart');

        if ($product->stock_quantity < $request->quantity) {
            return redirect()->back()->with('error', "Stok $product->name tidak cukup! (Sisa $product->stock_quantity)");
        }

        if(isset($cart[$productId]) && $request->quantity > 0) {
            $cart[$productId]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Keranjang berhasil di-update!');
    }

    public function remove($productId)
    {
        $cart = session()->get('cart');

        if(isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang!');
    }

}
