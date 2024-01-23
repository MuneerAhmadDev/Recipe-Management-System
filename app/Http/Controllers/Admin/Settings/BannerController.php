<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\BannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bannerImages = Banner::paginate(2);
        return view('admin.settings.banner', ['bannerImages' => $bannerImages]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $file = $request->file('banner_image');
        $newName = 'banner_' . time() . rand() . '.' . $file->extension();
        // Store Banner Image
        $isFileUpload = Storage::putFileAs('public/settings/banner/', $file, $newName, 'public');
        if ($isFileUpload) {
            $res = Banner::create([
                'banner_image' => $newName
            ]);
            if ($res)
                return redirect()
                    ->back()
                    ->with('success', 'Image Added');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        // Deleting old image
        Storage::delete('public/settings/banner/' . $banner->banner_image);
        $res = $banner->delete($id);
        if ($res)
            return redirect()
                ->back();
    }
}
