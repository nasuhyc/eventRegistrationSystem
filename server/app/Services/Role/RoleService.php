<?php

namespace App\Services\Role;

use App\Models\Role;


class RoleService{


    public function store($request)
    {
        $role = Role::create([
            'name' => $request->name,
        ]);
        return $role;
    }

    public function index()
    {
        $roles = Role::all();
        return $roles;
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return $role;
    }

    public function update($request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);
        return $role;
    }

    public function destroy($id){
        $role=Role::findOrFail($id);
        $role->delete();
        return $role;
    }


}




?>
