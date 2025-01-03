<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ChFavorite;
use App\Models\Customer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required'],
            'no_tlp' => ['required'],
            'alamat' => ['required'],
        ]);


        // dd($request->all());

        $user = User::create(
           [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles,
            'gender' => $request->gender,
        ]);

        if ($user->roles = "customer") {
            Customer::create([
                'user_id' => $user->id,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
            ]);
            ChFavorite::create([
                'user_id' => $user->id,
                'favorite_id' => 2,
            ]);
            ChFavorite::create([
                'user_id' => $user->id,
                'favorite_id' => 3,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);
        return redirect('dashboard');
    }
}
