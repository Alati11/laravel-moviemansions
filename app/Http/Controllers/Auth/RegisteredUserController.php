<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->all();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'profile_pic' => [
                "nullable",
                "mimes:jpeg,png,jpg,gif,webp",
                File::image()
                    ->min('1kb')
                    ->max('10mb')
                ],
            'date_of_birth' => ['nullable', 'date_format:Y-m-d', 'after:' . date('Y-m-d', strtotime('-100 years')), 'before:' . date('Y-m-d', strtotime('-16 years'))],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        if ($request->hasFile('profile_pic')) {

            $file_path = Storage::put('img/users', $request->profile_pic);

            $data['profile_pic'] = $file_path;
        }

        

        $password_hash = Hash::make($request->password);
        $data['password'] = $password_hash; 

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
