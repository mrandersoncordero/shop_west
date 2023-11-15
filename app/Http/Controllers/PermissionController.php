<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function assignRoleUser(Request $request) {

        $request->validate([
            'user_id' => 'required|integer',
            'permission_id' => 'required|integer'
        ]);

        $user_role = UserRole::create([
            'user_id' => $request->user_id,
            'permission_id' => $request->permission_id
        ]);
        $user_role->save();

        return back()->with('message', [
            'class' => 'alert--success',
            'title' => 'Usuario creado correctamente',
            'content' => "Roles agregados correctamente"
        ]);
    }
}
