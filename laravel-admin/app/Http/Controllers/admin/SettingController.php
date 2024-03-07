<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Setting;

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

    //Setting
    public function global_setting(Request $request)
    {
        if ($request->isMethod('GET')) {
            $setting = Setting::where('id', '1')->first();
            return view('admin.setting.global-setting', compact('setting'));
        }
        if ($request->isMethod('POST')) { 
            $validator = Validator::make($request->all(),[
                'companyname' => 'required|max:255',
                'phone' => 'required|numeric',
                'email' => 'required|email',
                'address' => 'required',
            ]);
            if ($validator->passes()){
                // Check if the page exists in the database
                $setting = Setting::where('id', '1')->first();
                if ($setting) {
                    if($request->hasFile('logo')){
                        $request->validate([
                        'logo' => 'required|image|mimes:jpg,png,jpeg,webp|max:1024',
                        ]);
                        $logofile = 'logo.'.$request->logo->extension();  
                        $request->logo->move(public_path('uploads'), $logofile);
                        $setting->logo = $logofile;
                    }
                    if($request->hasFile('favicon')){
                        $request->validate([
                        'favicon' => 'required|image|mimes:jpg,png,jpeg,webp|max:1024',
                        ]);
                        $faviconfile = 'favicon.'.$request->favicon->extension();  
                        $request->favicon->move(public_path('uploads'), $faviconfile);
                        $setting->favicon = $faviconfile;
                    }
                    $setting->company_name = $request->companyname;
                    $setting->phone = $request->phone;
                    $setting->alt_phone = $request->altphone;
                    $setting->email = $request->email;
                    $setting->alt_email = $request->altemail;
                    $setting->address = $request->address;
                    $setting->alt_address = $request->altaddress;
                    $setting->google_map = $request->googlemap;
                    $setting->custom_text = $request->customtext;
                    $setting->save();
                    return redirect()->route('setting.setting')->with('settingsuccess','Global Setting Updated successfully.');
                } else {
                    $setting = new Setting;
                    if($request->hasFile('logo')){
                        $request->validate([
                        'logo' => 'required|image|mimes:jpg,png,jpeg,webp|max:1024',
                        ]);
                        $logofile = 'logo.'.$request->logo->extension();  
                        $request->logo->move(public_path('uploads'), $logofile);
                        $setting->logo = $logofile;
                    }
                    if($request->hasFile('favicon')){
                        $request->validate([
                        'favicon' => 'required|image|mimes:jpg,png,jpeg,webp|max:1024',
                        ]);
                        $faviconfile = 'favicon.'.$request->favicon->extension();  
                        $request->favicon->move(public_path('uploads'), $faviconfile);
                        $setting->favicon = $faviconfile;
                    }
                    $setting->company_name = $request->companyname;
                    $setting->phone = $request->phone;
                    $setting->alt_phone = $request->altphone;
                    $setting->email = $request->email;
                    $setting->alt_email = $request->altemail;
                    $setting->address = $request->address;
                    $setting->alt_address = $request->altaddress;
                    $setting->google_map = $request->googlemap;
                    $setting->custom_text = $request->customtext;
                    $setting->id = '1';
                    $setting->save();
                    return redirect()->route('setting.setting')->with('settingsuccess','Global Setting has been added successfully.');
                }
            } else {
                return redirect()->route('setting.setting')->withErrors($validator);
            }
        }
    }

    //CUSTOM SCRIPT
    public function website_script(Request $request){
        $validator = Validator::make($request->all(),[
            'headerscript' => 'required',
            'bodyscript' => 'required',
            'footerscript' => 'required',
        ]);
        if ($validator->passes()){
            $setting = Setting::where('id', '1')->first();
                if ($setting) {
                    $setting->header_script = $request->headerscript;
                    $setting->body_script = $request->bodyscript;
                    $setting->footer_script = $request->footerscript;
                    $setting->save();
                    return redirect()->route('setting.setting')->with('success','Global Setting Updated successfully.');
                } else {
                    $setting = new Setting;
                    $setting->header_script = $request->headerscript;
                    $setting->body_script = $request->bodyscript;
                    $setting->footer_script = $request->footerscript;
                    $setting->id = '1';
                    $setting->save();
                    return redirect()->route('setting.setting')->with('success','Global Setting added successfully.');
                }
        } else {
            return redirect()->route('setting.setting')->withErrors($validator);
        }
    }

    //SOCIAL MEDIA
    public function social_media(Request $request)
    {
        if ($request->isMethod('GET')) {
            $setting = Setting::where('id', '1')->first();
            return view('admin.setting.social-media', compact('setting'));
        }
        if($request->isMethod('POST')) {
            $validator = Validator::make($request->all(),[
                'facebook' => 'required',
                'instagram' => 'required',
                'linkedin' => 'required',
            ]);
            if ($validator->passes()){
                $setting = Setting::where('id', '1')->first();
                    if ($setting) {
                        $setting->facebook = $request->facebook;
                        $setting->instagram = $request->instagram;
                        $setting->linkedin = $request->linkedin;
                        $setting->twitter = $request->twitter;
                        $setting->youtube = $request->youtube;
                        $setting->pinterest = $request->pinterest;
                        $setting->whatsapp = $request->whatsapp;
                        $setting->telegram = $request->telegram;
                        $setting->save();
                        return redirect()->route('setting.social-media')->with('success','Social Media has been Updated successfully.');
                    } else {
                        $setting = new Setting;
                        $setting->facebook = $request->facebook;
                        $setting->instagram = $request->instagram;
                        $setting->linkedin = $request->linkedin;
                        $setting->twitter = $request->twitter;
                        $setting->youtube = $request->youtube;
                        $setting->pinterest = $request->pinterest;
                        $setting->whatsapp = $request->whatsapp;
                        $setting->telegram = $request->telegram;
                        $setting->id = '1';
                        $setting->save();
                        return redirect()->route('setting.social-media')->with('success','Social Media has been added successfully.');
                    }
            } else {
                return redirect()->route('setting.social-media')->withInput()->withErrors($validator);
            }
        }
    }

    //CHANGE PASSWORD 
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
                return redirect()->route('setting.password')->withInput()->with("error", "Old Password Doesn't match!");
            }
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]); 
            return redirect()->route('setting.password')->with("success", 'Password updated successfully');
        }
    }
    
}
