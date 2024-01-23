<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('contentSearch')) {
            $searchKeyword = $request->input('contentSearch');
            $users = User::where('name', 'like', '%' . $searchKeyword . '%')
                ->orWhere('email', 'like', '%' . $searchKeyword . '%')
                ->orWhere('profession', 'like', '%' . $searchKeyword . '%')
                ->orWhere('role', 'like', '%' . $searchKeyword . '%')
                ->paginate(8);
            return view('admin.user-management.users',  ['users' => $users]);
        } else {
            $users = User::paginate(8);
            return view('admin.user-management.users',  ['users' => $users]);
        }
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.user-management.view-user', compact('user'));
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        // Deleting Picture
        Storage::delete('public/users/' . $user->picture);
        $res = $user->delete();
        if ($res)
            return redirect()
                ->back();
    }
}
