<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user(Request $request){
        $search = $request->input('q');
        $data = User::where('name', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'User',
            'subTitle' => null,
            'user' => $data
        ];
        return view('app.user.user',  $data);
    }

    public function userStore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.userr')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $user = New User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('admin.user')->with('success', 'User has been created successfully');
    }

    public function userUpdate($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.user')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect()->route('admin.user')->with('success', 'User has been updated successfully');
    }

    public function userDestroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User has been deleted successfully');
    }
}
