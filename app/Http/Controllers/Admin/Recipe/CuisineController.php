<?php

namespace App\Http\Controllers\Admin\Recipe;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('contentSearch')) {
            $keyword = $request->input('contentSearch');
            $cuisines = Cuisine::where('name', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(10);
            return view('admin.cuisine-management.cuisine', compact('cuisines'));
        } else {
            $cuisines = Cuisine::latest()
                ->paginate(10);
            return view('admin.cuisine-management.cuisine', compact('cuisines'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cuisine-management.add-cuisine');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = Cuisine::create([
            'name' => $request->input('cuisine_name')
        ]);
        if ($res)
            return response()
                ->json(['status' => 'success', 'message' => 'Cuisine added successfully']);
        else
            return response()
                ->json(['status' => 'error', 'message' => 'Failed to add cuisine']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cuisine = Cuisine::find($id);
        return view('admin.cuisine-management.update-cuisine', compact('cuisine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cuisine = Cuisine::find($id);
        $res = $cuisine->update([
            'name' => $request->input('cuisine_name')
        ]);
        if ($res)
            return response()
                ->json(['status' => 'success', 'message' => 'Cuisine updated successfully']);
        else
            return response()
                ->json(['status' => 'error', 'message' => 'Failed to update cuisine']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cuisine = Cuisine::find($id);
        $res = $cuisine->delete();
        if ($res) {
            return response()
                ->json(['status' => 'success']);
        } else {
            return response()
                ->json(['status' => 'error', 'message' => 'Failed to delete cuisine']);
        }
    }
}
