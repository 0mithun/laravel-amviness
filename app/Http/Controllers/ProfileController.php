<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('super_admin')->user();
            return $next($request);
        });
    }

    // /Setting Section
    public function profile()
    {
        if (is_null($this->user) || !$this->user->can('profile.view')) {
            abort(403, 'Sorry !! You are Unauthorized to profile.');
        }
        $user = auth()->user();
        return view('backend.profile.index', compact('user'));
    }

    public function setting()
    {
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to profile settings.');
        }
        $user = auth()->user();
        return view('backend.profile.setting', compact('user'));
    }

    public function profile_update(Request $request, SuperAdmin $user)
    {
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to profile settings.');
        }
        $id = Auth::user()->id;
        $this->validate($request, [
            'name' => "required",
            'email' => "required|unique:users,email,$id",
        ]);

        $user = SuperAdmin::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('image')) {
            $image = $request->image;
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/user', $image, $fileName);
            $db_image = 'storage/user/' . $fileName;
            $user->image = $db_image;
        }
        $user->save();
        session()->flash('success', 'Role Updated Successfully!');
        return back();
    }

    public function profile_password_update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to profile settings.');
        }
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $password_check = Hash::check($request->current_password, Auth::user()->password);
        if ($password_check) {
            $user = SuperAdmin::findOrFail($id);
            $user->update([
                'password' => bcrypt($request->password),
                'updated_at' => Carbon::now(),
            ]);
        }
        session()->flash('success', 'Role Updated Successfully!');
        return back();
    }
}
