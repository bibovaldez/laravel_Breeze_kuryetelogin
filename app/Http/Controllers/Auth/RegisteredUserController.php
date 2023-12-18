<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Meter;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

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

        // "fname" => "JohnRey"
        // "mname" => "Espiritu"
        // "lname" => "Valdez"
        // "phone" => "09214874873"
        // "province" => "Isabela"
        // "municipality" => "Burgos"
        // "barangay" => "Raniag"
        // "MID" => "21"
        // "PIN" => "12"
        // "email" => "bibovaldez2002@gmail.com"
        // "password" => "11111111"
        // "password_confirmation" => "11111111"

        $validatedData = $request->validate([
            'fname' => 'required|string|max:255|regex:/^[a-zA-Z]+$/u',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            // validate if the MID is existing in the meter table 
            'MID' =>'required',

            // 'email' => 'required|string|email|max:255|unique:users',
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        dd($request->all());

        $user = User::create([
            'firstName' => $validatedData['fname'],
            'middleName' => $validatedData['mname'],
            'lastName' => $validatedData['lname'],
            'phone' => $validatedData['phone'],
            'Province' => $validatedData['province'],
            'Municipality' => $validatedData['municipality'],
            'Barangay' => $validatedData['barangay'],
            'F_MID' => $validatedData['MID'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
