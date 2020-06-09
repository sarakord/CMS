<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('back.users.users', ['users' => User::orderby('id', 'DESC')->paginate(5)]);
    }

    public function edit(User $user)
    {
        return view('back.users.profile', ['user' => $user]);
    }


    public function update(UpdateUser $request, User $user)
    {
        if (!empty($request->password)) {
            $validatedData = $request->validate([
                'password' => 'min:8',
                'password_confirmation' => 'min:8'
            ], [
                'password.min' => "تکرار رمز غبور باید حداقل 8 کاراکتر داشته باشد",
                'password_confirmation.min' => "تکرار رمز غبور باید حداقل 8 کاراکتر داشته باشد"
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
            switch ($exception->getCode()) {
            }
            return redirect(route('admin.users'))->with('warning', $exception->getCode());
        }
        $message = "ویرایش با موفقیت انجام شد";
        return redirect(route('admin.users'))->with('success', $message);
    }


    public function destroy(User $user)
    {
        $user->delete();
        $msg = "کاربر مورد نظر حذف شد";
        return redirect()->back()->with('success', $msg);
    }

    public function updatestatus(User $user)
    {
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();
        $msg = "نقش کاربر مورد نظر با موفقیت تغییر کرد";
        return redirect()->back()->with('success', $msg);
    }

}
