<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $settings = Setting::find($id);
        return view('admin.settings.setting', ['settings' => $settings]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, string $id)
    {
        $setting = Setting::find($id);
        // Checking request has file or not.
        if ($request->hasFile('company_logo')) {
            $siteLogo = $request->file('company_logo');
            // Deleting old file
            Storage::delete('public/settings/logo/' . $setting->company_logo);
            // Renaming file
            $newName = 'logo_' . time() . rand() . '.' . $siteLogo->extension();
            $isFileUpload = Storage::putFileAs('public/settings/logo/', $siteLogo, $newName, 'public');
            if ($isFileUpload) {
                // Storing data in DB
                $res = $setting->update([
                    'company_logo' => $newName,
                    'company_name' => $request->input('company_name'),
                    'company_email' => $request->input('company_email'),
                    'company_address' => $request->input('company_address'),
                    'company_description' => $request->input('company_description'),
                    'company_phone' => $request->input('company_phone'),
                    'company_copyright' => $request->input('company_copyright'),
                ]);

                if ($res)
                    return redirect()
                        ->back()
                        ->with('success', 'Settings updated');
                else
                    return redirect()
                        ->back()
                        ->with('error', 'Server Error');
            }
        } else {
            $res = $setting->update([
                'company_name' => $request->input('company_name'),
                'company_email' => $request->input('company_email'),
                'company_address' => $request->input('company_address'),
                'company_description' => $request->input('company_description'),
                'company_phone' => $request->input('company_phone'),
                'company_copyright' => $request->input('company_copyright'),
            ]);
            if ($res)
                return redirect()
                    ->back()
                    ->with('success', 'Settings updated');
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
        //
    }
}
