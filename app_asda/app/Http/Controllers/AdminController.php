<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $information = User::findorFail(auth()->user()->id);
        return view('pages.Users.profile', compact('information'));
    }

    public function update(Request $request, $id)
    {

        $information = User::findorFail($id);

        if (!empty($request->password)) {
            $information->Name = ['fr' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
            $information->Name = ['fr' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->save();
        }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();


    }
}
