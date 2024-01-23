<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('contentSearch')) {
            $searchKeyword = $request->input('contentSearch');
            $categories = Category::orderBy('created_at', 'desc')
                ->where('name', 'like', '%' . $searchKeyword . '%')
                ->paginate(4);
            return view('admin.category-management.category', ['categories' => $categories]);
        } else {
            $categories = Category::orderBy('created_at', 'desc')
                ->paginate(4);
            return view('admin.category-management.category', ['categories' => $categories]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category-management.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $file = $request->file('category_picture');
        $newName = 'category_' . time() . rand() . '.' . $file->extension();
        $isFileUpload = Storage::putFileAs('public/category/', $file, $newName, 'public');
        // Store data in DB
        if ($isFileUpload) {
            $res = Category::create([
                'name' => $request->input('category_name'),
                'picture' => $newName
            ]);
            if ($res)
                return redirect()
                    ->back()
                    ->with('success', 'Category Added successfully.');
            else
                return redirect()
                    ->back()
                    ->with('error', 'Server Error');
        }
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
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category-management.update-category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('category_picture')) {
            // Deleting old file
            Storage::delete('public/category/' . $category->picture);
            // Storing new file
            $file = $request->file('category_picture');
            $newName = 'category_' . time() . rand() . '.' . $file->extension();
            $isFileUpload = Storage::putFileAs('public/category/', $file, $newName, 'public');
            // Store data in DB
            if ($isFileUpload) {
                $res =  $category->update([
                    'name' => $request->input('category_name'),
                    'picture' => $newName
                ]);
                if ($res)
                    return redirect()
                        ->back()
                        ->with('success', 'Category Updated successfully.');
                else
                    return redirect()
                        ->back()
                        ->with('error', 'Server Error');
            }
        } else {
            $res =  $category->update([
                'name' => $request->input('category_name')
            ]);
            if ($res)
                return redirect()
                    ->back()
                    ->with('success', 'Category Updated successfully.');
            else
                return redirect()
                    ->back()
                    ->with('error', 'Server Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        Storage::delete('public/category/' . $category->picture);
        $res = $category->delete();
        if ($res)
            return redirect()
                ->back();
    }
}
