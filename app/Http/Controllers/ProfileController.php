<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Profil',
            'subTitle' => null,
            'page_id' => null
        ];
        return view('app.profile.profile',  $data);
    }

    public function profileUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'photo' => 'nullable|sometimes|mimes:jpeg,bsmp,png,jpg,svg,png|max:2000',
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.profile')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $profile =  User::find(Auth::user()->id);
        $profile->name  = $request->name;
        if($request->photo){
            $profile->photo_path =  $request->file('photo')->store('user', 'public');
        }
        $profile->save();

        return redirect()->route('admin.profile')->with('success', 'Profile has been saved successfully');
    }

    public function signinUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
        ]);
        if ($validator->fails()) {
        return redirect()->route('admin.profile')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $profile =  User::find(Auth::user()->id);
        $profile->email = $request->input('email');
        $profile->save();

        return redirect()->route('admin.profile')->with('success', 'Profile has been saved successfully');
    }

    public function changePassword(Request $request){
        $user = Auth::user();
        $oldPassword = $request->input('oldPassword');
    
        if (!Hash::check($oldPassword, $user->password)) {
            return redirect()->route('admin.profile')->with('error', 'Old password is incorrect');
        }
        
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('admin.profile')->with('error', 'Validation Error')->withErrors($validator);
        }
    
        $userSave = User::findOrFail($user->id);
        $userSave->password = Hash::make($request->input('newPassword'));
        $userSave->save();
    
        return redirect()->route('admin.profile')->with('success', 'Password has been saved successfully');
    }
}
