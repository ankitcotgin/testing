<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Update Profile
    public function profile(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.setting.profile');
        }

        if ($request->isMethod('POST')) {
            $input[] = '';
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required',
                'phone' => 'numeric',
            ]);
            if ($validator->passes())
            {
                if ($request->hasFile('avatar')) {
                    $request->validate([
                        'avatar' => 'required|image|mimes:jpg,png,jpeg,webp|max:1024',
                    ]);
                    $avatarName = 'avatar_'.time().'.'.$request->avatar->getClientOriginalExtension();
                    $request->avatar->move(public_path('uploads/profile'), $avatarName);
                    $input['avatar'] = $avatarName;
                } 
                $input['name'] = $request->name;
                $input['email'] = $request->email;
                $input['phone'] = $request->phone;
                auth()->user()->update($input);
                return redirect()->route('setting.profile')->with('success','profile has been updated successfully.');
            } else {
                return redirect()->route('setting.profile')->withErrors($validator);
            }
        }
    }

    //PASSWORD 
    public function password(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.setting.change-password');
        }

        if ($request->isMethod('POST')) {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);
            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]); 
            return back()->with("success", 'Password updated successfully');
        }
    }

    //Change Password
    
}
