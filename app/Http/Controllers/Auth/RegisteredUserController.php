<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            
            // --- VALIDACIÓN DE TELÉFONO ACTUALIZADA ---
            // 'regex:/^[0-9]+$/': Solo permite números (sin espacios ni guiones).
            // 'digits_between:10,15': Mínimo 10 (Colombia), Máximo 15 (Estándar Internacional E.164).
            'phone' => ['required', 'string', 'regex:/^[0-9]+$/', 'digits_between:10,15'], 
            
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            // No agregamos 'is_admin' aquí, por lo que la base de datos
            // automáticamente le pone '0' (Falso).
        ]);

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    Auth::login($user);

    // LÓGICA DE DIRECCIONAMIENTO
    if ($user->is_admin) {
        return redirect(route('dashboard', absolute: false));
    }

    return redirect(route('home'));
}
}
