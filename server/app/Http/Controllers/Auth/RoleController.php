<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Role\RoleService;
use App\Http\Requests\Role\RoleRequest;
use App\Http\Resources\Role\RoleCollection;
use App\Http\Resources\Role\RoleResource;

class RoleController extends Controller
{

    public function __construct(
        protected RoleService $roleService
    ){}

    public function store(RoleRequest $request): RoleResource
    {
        $role = $this->roleService->store($request);
        return new RoleResource($role);
    }

    public function index(): RoleCollection
    {
        $roles=$this->roleService->index();
        return new RoleCollection($roles);
    }

    public function show($id): RoleResource
    {
        $role = $this->roleService->show($id);
        return new RoleResource($role);
    }

    public function update(RoleRequest $request, $id): RoleResource
    {
        $role = $this->roleService->update($request, $id);
        return new RoleResource($role);
    }


    public function destroy($id){
        $role = $this->roleService->destroy($id);
        return new RoleResource($role);
    }

    public function allRoles(){
        $roles = $this->roleService->allRoles();
        return new RoleCollection($roles);
    }




}
