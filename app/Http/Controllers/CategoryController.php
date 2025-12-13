<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    /**
     * Display all category list
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
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
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name'
        ]);

        $category = Category::create([
            'name' => $validate['name'],
        ]);


        ActivityLog::create([
            'activity_type' => 'create',
            'description' => 'Menambahkan kategori "' . $category->name . '"',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }

    /**
     * Update specified category resource from storage
     *
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name' . $id
        ]);

        $category =  Category::find($id);
        $category->update([
            'name' => $validate['name']
        ]);


        ActivityLog::create([
            'activity_type' => 'update',
            'description' => 'Mengupdate kategori "' . $category->name . '"',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category update successfully');
    }

    /**
     * Remove specified category from storage
     *
     *
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $categoryName = $category->name;
        $category->delete();


        ActivityLog::create([
            'activity_type' => 'delete',
            'description' => 'Menghapus kategori "' . $categoryName . '"',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }

    /**
     * Show the form for creating new category
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Display specified category
     *
     *
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for edit category
     *
     *
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }
}
