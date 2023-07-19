<?php

namespace App\Services\Role;

use App\Models\Role;
use Illuminate\Support\Facades\Gate;



class RoleService{

    public function authRoleControl()
    {
        if(!Gate::allows('isAdmin')){
            abort(403);
        }
    }

    public function store($request)
    {
        self::authRoleControl();
        $role = Role::create([
            'name' => $request->name,
        ]);

        return $role;
    }

    public function index()
    {
        self::authRoleControl();
        $roles = Role::all();
        return $roles;
    }

    public function show($id)
    {
        self::authRoleControl();
        $role = Role::findOrFail($id);
        return $role;
    }

    public function update($request, $id)
    {
        self::authRoleControl();
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);
        return $role;
    }

    public function destroy($id){
        self::authRoleControl();
        $role=Role::findOrFail($id);
        $role->delete();
        return $role;
    }


}




?>
