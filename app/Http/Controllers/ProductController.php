<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display all category list
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Store a newly created category
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $input = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($photo = $request->file('photo')) {
            $destinationPath = $photo->store('products', 'public');
            $input['photo'] = $destinationPath;
        }

        $product = Product::create($input);


        ActivityLog::create([
            'activity_type' => 'create',
            'description' => 'Menambahkan menu baru "' . $product->name . '"',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Update specified table resource from storage
     *
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $product =  Product::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $input = $request->except(['photo', '_method', '_token']);

        if ($photo = $request->file('photo')) {

            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            $destinationPath = $photo->store('products', 'public');
            $input['photo'] = $destinationPath;
        }

        $product->update($input);


        ActivityLog::create([
            'activity_type' => 'update',
            'description' => 'Mengupdate menu "' . $product->name . '"',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product update successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $productName = $product->name;

        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();


        ActivityLog::create([
            'activity_type' => 'delete',
            'description' => 'Menghapus menu "' . $productName . '"',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
}
