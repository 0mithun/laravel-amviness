<?php

namespace App\Http\Controllers;

use App\Actions\Profile\ProfileUpdate;
use App\Http\Requests\ProfileRequest;
use App\Models\SuperAdmin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function profile_update(ProfileRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to profile settings.');
        }

        try {
            $profile = ProfileUpdate::update($request);

            if ($profile) {
                flashSuccess('Profile Updated Successfully');
                return back();
            } else {
                flashError('Current password does not match');
                return back();
            }
        } catch (\Throwable $th) {
            flashError($th->getMessage());
            return back();
        }
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
