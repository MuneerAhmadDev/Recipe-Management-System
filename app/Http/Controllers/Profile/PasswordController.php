<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
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
        if (auth()->user()->role === 'admin')
            return view('admin.profile.password');
        else
            return view('users.password');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PasswordRequest $request, string $id)
    {
        $user = User::find($id);
        if (Hash::check($request->input('currentPassword'), $user->password)) {
            $res = $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
            if ($res)
                return redirect()
                    ->back()
                    ->with('success', 'Password updated successfully!');
            else
                return redirect()
                    ->back()
                    ->with('error', 'Server Error');
        } else
            return redirect()
                ->back()
                ->with('error', 'Old Password not correct.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
