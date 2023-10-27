<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::all(),
        ]);
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'dni' => 'required|string|max:11|unique:profiles,dni',
            'first_name' => 'required|string|max:40',
            'last_name' => 'required|string|max:40',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:17',
            'birthday_date' => 'nullable|date',
            'name' => 'required|string|max:64|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => 1,
        ]);

        $user->assignRole('client');
        event(new Registered($user));
        
        $profile = Profile::create([
            'user_id' => $user->id,
            'dni' => $request->dni,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'birthday_date' => $request->birthday_date,
        ]);
        $profile->save();

        return redirect()->route('users.edit', $user);
    }

    public function edit(User $user): View
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'dni' => 'required|string|max:11|unique:profiles,dni,'. $user->profile->id,
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:17'],
            'birthday_date' => ['nullable', 'date'],
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'string'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => 1,
        ]);

        $newRole = $request->role;

        $user->syncRoles([$newRole]);

        if ($user->profile) {
            $user->profile->update([
                'user_id' => $user->id,
                'dni' => $request->dni,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'birthday_date' => $request->birthday_date,
            ]);
        } else {
            // El usuario no tiene un perfil existente, así que crea uno nuevo
            $user->profile()->create([
                'user_id' => $user->id,
                'dni' => $request->dni,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'birthday_date' => $request->birthday_date,
            ]);
        }

        return redirect()->route('users.edit', $user);

        
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
