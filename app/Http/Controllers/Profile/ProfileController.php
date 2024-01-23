<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        if (Auth()->user()->role === 'admin')
            return view('admin.profile.profile');
        else
            return view('users.profile');
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        // Checking update request with Picture or not
        if ($request->hasFile('userPicture')) {
            // Deleting old picture
            Storage::delete('public/users/' . $user->picture);
            // Uploading new picture
            $file = $request->file('userPicture');
            $newName = 'user_' . time() . rand() . '.' . $file->extension();
            $isUpload = Storage::putFileAs('public/users/', $file, $newName, 'public');
            if ($isUpload) {
                if (auth()->user()->email === 'admin')
                    $res = $user->update([
                        'name' => $request->input('userName'),
                        'email' => $request->input('userEmail'),
                        'profession' => $request->input('userProfession'),
                        'picture' => $newName,
                    ]);
                else
                    $res = $user->update([
                        'name' => $request->input('userName'),
                        'email' => $request->input('userEmail'),
                        'profession' => $request->input('userProfession'),
                        'picture' => $newName,
                    ]);
                if ($res)
                    return redirect()
                        ->back()
                        ->with('success', 'Profile updated');
                else
                    return redirect()
                        ->back()
                        ->with('error', 'Server Error');
            }
        } else {
            $res = $user->update([
                'name' => $request->input('userName'),
                'email' => $request->input('userEmail'),
                'profession' => $request->input('userProfession'),
            ]);
            if ($res)
                return redirect()
                    ->back()
                    ->with('success', 'Profile updated');
            else
                return redirect()
                    ->back()
                    ->with('error', 'Server Error');
        }
    }
}
