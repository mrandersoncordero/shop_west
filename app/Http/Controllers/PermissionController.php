<?php

namespace App\Http\Controllers;

use App\Models\UserPermission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function addPermission(Request $request) 
    {

        //dd($request);
        
        $delete_permissions_user = UserPermission::where('user_id', $request->user_id)->delete();

        foreach ($request->permissions as $key => $value) {
            $create_user_permission = UserPermission::create([
                'user_id' => $request->user_id,
                'permission_id' => $value
            ]);

            $create_user_permission->save();
        }

        return back()->with('message', [
            'class' => 'alert--success',
            'title' => 'Actulizacion de Roles',
            'content' => "Roles agregados correctamente"
        ]);
    }
}
