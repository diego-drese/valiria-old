<?php
namespace Valiria\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Valiria\Http\Controllers\Controller;
use Valiria\Http\Resources\RoleCollection;
use Valiria\Http\Resources\RoleResource;
use Valiria\Models\Role;
use Valiria\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $limit = request()->has('limit') ? request()->get('limit') : null;
        return new RoleCollection(Role::paginate($limit));
    }

    public function store(Request $request)
    {
        return new RoleResource(Role::create($request->all()));
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(null, 204);
    }
}
