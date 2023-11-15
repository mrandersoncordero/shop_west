<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Permission;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasPermission(18, 'No tienes permisos para ver usuarios')) {
            return view('admin.user.index', [
                'users' => User::all(),
                'roles' => Role::all(),
            ]);
        }
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        if (Auth::user()->hasPermission(19, 'No tienes permisos para crear usuarios')) {
            $request->validate([
                'dni' => 'required|string|max:11|unique:profiles,dni',
                'first_name' => 'required|string|max:40',
                'last_name' => 'required|string|max:40',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|string|max:17',
                'birthday_date' => 'nullable|date',
                'withholding_tax' => 'nullable|string|max:5',
                'name' => 'required|string|max:64|unique:users,name',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => ['required', 'confirmed', Password::defaults()],
                'role_id' => ['required', 'integer'],
            ]);
            
            $user = User::create([
                'role_id' => $request->role_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_active' => 1,
            ]);

            event(new Registered($user));
            
            $profile = Profile::create([
                'user_id' => $user->id,
                'dni' => $request->dni,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'birthday_date' => $request->birthday_date,
                'withholding_tax' => $request->withholding_tax,
            ]);
            $profile->save();

            Mail::to($user->email)->send(new WelcomeMail($user));
            
            return redirect()->route('users.edit', $user)->with('message', [
                'class' => 'alert--success',
                'title' => 'Usuario creado correctamente',
                'content' => "El Ususario {$user->name} ha sido creado correctamente."
            ]);
        }
        
    }

    public function edit(User $user): View
    {
        if (Auth::user()->hasPermission(20, 'No tienes permisos para editar usuarios')) {
            return view('admin.user.edit', [
                'user' => $user,
                'roles' => Role::all(),
                'permissions' => Permission::all(),
                'user_permissions' => UserPermission::where('user_id', $user->id)->get()
            ]);
        }
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->hasPermission(20, 'No tienes permisos para editar usuarios')) {
            //dd($request->all());
            $request->validate([
                'dni' => 'required|string|max:11|unique:profiles,dni,'. $user->profile->id,
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'address' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string', 'max:17'],
                'birthday_date' => ['nullable', 'date'],
                'withholding_tax' => 'nullable|string|max:6',
                'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'role_id' => ['required', 'integer'],
            ]);

            $user->update([
                'role_id' => $request->role_id,
                'name' => $request->name,
                'email' => $request->email,
                'is_active' => 1,
            ]);

            if ($user->profile) {
                $user->profile->update([
                    'user_id' => $user->id,
                    'dni' => $request->dni,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'birthday_date' => $request->birthday_date,
                    'withholding_tax' => $request->withholding_tax,
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
                    'withholding_tax' => $request->withholding_tax,
                ]);
            }

            return redirect()->route('users.edit', $user)->with('message', [
                'class' => 'alert--warning',
                'title' => 'Usuario actualizado correctamente',
                'content' => "El Ususario @{$user->name} fue actualizado correctamente"
            ]);
        }
    }

    public function destroy(User $user)
    {
        if (Auth::user()->hasPermission(21, 'No tienes permisos para eliminar usuarios')) {
            $user->delete();
            return back();
        }
    }
}
