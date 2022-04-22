<?php
/*

=========================================================
* Argon Dashboard PRO - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro-laravel
* Copyright 2018 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)

* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/
namespace App\Http\Controllers;

use Gate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        /* if (Gate::denies('update', auth()->user())) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        } */

        $user = User::where('id', Auth::user()->id)->first();

        if (isset($request->picture)) {
            $file = date('d-m-Y-His').'.'.$request->file('picture')->getClientOriginalExtension();
            $request->picture->move(public_path('/admin/assets/img/theme'), $file);

            $user->picture = $file;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (Gate::denies('update', auth()->user())) {
            return back()->withErrors([
                'not_allow_password' => __('You are not allowed to change the password for a default user.')
            ]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
