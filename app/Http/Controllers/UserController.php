<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Category;
use App\Models\Permission;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
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
            try {
                $user->delete();

                return back()->with('message', [
                    'class' => 'alert--success',
                    'title' => 'Usuario eliminado correctamente',
                    'content' => "El Usuario {$user->name} fue eliminado correctamente"
                ]);
            } catch (QueryException $e) {
                $errorCode = $e->errorInfo[1];

                if ($errorCode == 1451) {
                    return back()->with('message', [
                        'class' => 'alert--danger',
                        'title' => 'Error',
                        'content' => "No se puede eliminar el usuario ({$user->name}) por que posee valores asociados."
                    ]);
                }
            }
        }
    }

    public function viewProfile(): View
    {
        $user = Auth::user();

        $cart = new CartController();
        return view('user.profile', [
            'user' => $user,
            'categories' => Category::all(),
            'cart_products' => $cart->show_products()
        ]);
    }

    public function updateProfile(Request $request, User $user): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'dni' => 'required|string|max:11|unique:profiles,dni,'. $user->profile->id,
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:17'],
            'birthday_date' => ['nullable', 'date'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $user->profile->update([
            'dni' => $request->dni,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'birthday_date' => $request->birthday_date,
        ]);

        return redirect()->route('user.view')->with('message', [
            'class' => 'border_color-success',
            'title' => 'Perfil actualizado correctamente',
            'content' => 'Tu perfil ha sido actualizado correctamente.',
        ]);
    }

    public function changePassword(Request $request): RedirectResponse
    {
        // Validamos los campos del formulario
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Obtenemos el usuario autenticado
        $user = Auth::user();

        // Verificamos si la contraseña actual coincide con la almacenada en la base de datos
        if (!Hash::check($request->current_password, $user->password)) {
            // Si no coincide, redirigimos de vuelta con un mensaje de error
            return redirect()->back()->with('message', [
                'class' => 'border_color-danger',
                'title' => 'Error',
                'content' => 'La contraseña actual no coincide con la del usuario',
            ]);
        }

        // Verificamos que la nueva contraseña sea diferente de la actual
        if ($request->current_password == $request->new_password) {
            // Si son iguales, redirigimos de vuelta con un mensaje de error
            return redirect()->back()->with('message', [
                'class' => 'border_color-danger',
                'title' => 'Error',
                'content' => 'La nueva contraseña debe ser diferente de la actual.',
            ]);
        }

        // Actualizamos la contraseña del usuario en la base de datos
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Redirigimos a la página del perfil del usuario con un mensaje de éxito
        return redirect()->route('user.view')->with('message', [
            'class' => 'border_color-success',
            'title' => 'Contraseña actualizada correctamente',
            'content' => 'Tu contraseña ha sido actualizada correctamente.',
        ]);
    }
}
