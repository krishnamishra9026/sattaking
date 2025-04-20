<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.master.categories.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $category = new Category();
        $category->title       = $request->title;
        $category->slug        = Str::slug($request->title);
        $category->description = $request->description;
        $category->status      = $request->status;

        if ($request->hasfile('icon')) {
            $image      = $request->file('icon');
            $name       = $image->getClientOriginalName();
            $image->storeAs('uploads/categories/', $name, 'public');
            $category->icon = $name;
        }
        $category->save();


        return redirect()->route('admin.master.categories.index')->with('success', 'Category saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category->icon  = isset($category->icon) ? asset('storage/uploads/categories/'.$category->icon) : URL::to('assets/media/avatars/blank.png') ;
        return view('admin.master.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);

        $category->title       = $request->title;
        $category->slug        = Str::slug($request->title);
        $category->description = $request->description;
        $category->status      = $request->status;

        if ($request->hasfile('icon')) {
            $image      = $request->file('icon');
            $name       = $image->getClientOriginalName();
            $image->storeAs('uploads/categories/', $name, 'public');
            $category->icon = $name;
        }
        $category->save();

        return redirect()->route('admin.master.categories.index')->with('success', 'Category updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.master.categories.index')->with('success', 'Category deleted Successfully');
    }
}
