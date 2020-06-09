<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;


class UserController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        return view('front.auth.profile', ['user' => $user]);
    }


    public function update(UpdateUser $request, User $user)
    {
        if (!empty($request->password)) {
            $validatedData = $request->validate([
                'password' => 'min:8',
                'password_confirmation' => 'min:8'
            ],[
                'password.min'=>"رمز عبور باید حد اقل 8 کاراکتر داشته باشد",
                'password_confirmation.min'=>"تکرار رمز عبور باید حد اقل 8 کاراکتر داشته باشد"
            ]);

            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        try {
            $user->save();
        } catch (Exception $exception) {
            switch ($exception->getCode()) {}
            return redirect(route('home'))->with('warning', $exception->getCode());
        }
        $message = "ویرایش با موفقیت انجام شد";
        return redirect(route('home'))->with('success', $message);
    }


    public function destroy($id)
    {
        //
    }
}
