<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Customer;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        $user = auth()->user();
        $customer = $user->customer;
        $karyawan = $user->karyawan;
        $admin = $user->admin;
        return view('profile.edit', compact('user', 'customer', 'admin','karyawan'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request->all());
        $user = $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->save();

        if(auth()->user()->customer){
        $cus = auth()->user()->customer ?? new Customer();
        $cus->alamat = $request->alamat;
        $cus->no_tlp = $request->no_tlp;
        $cus->save();
        $user->customer()->save($cus);
        }

        if(auth()->user()->admin){
        $admin = auth()->user()->admin ?? new Admin();
        $admin->role_admin = $request->role_admin;
        $admin->save();

        $user->admin()->save($admin);
        }

        if(auth()->user()->karyawan){
            $karyawan = auth()->user()->karyawan ?? new Karyawan();
            $karyawan->no_tlp = $request->no_tlp;
            $karyawan->save();
    
            $user->karyawan()->save($karyawan);
            }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
