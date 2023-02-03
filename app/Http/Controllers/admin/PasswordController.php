<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('admin.profiles.index');
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with('msg','There is an error in the password')->with('type','danger');
        }
        if(Hash::check($request->new_password, auth()->user()->password)){
            return back()->with('msg','Please enter different password')->with('type','danger');
        }

        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password),
        ]);
        return back()->with('msg','Password changed successfully')->with('type','success');
    }
}
