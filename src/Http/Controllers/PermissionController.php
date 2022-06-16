<?php
namespace Valiria\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as RouteFacade;
use Valiria\Auth\Http\Resources\PermissionCollection;
use Valiria\Auth\Http\Resources\PermissionResource;
use Valiria\Auth\Models\Permission;
use Valiria\Http\Controllers\Controller;

class PermissionController extends Controller {

    public function index(){
        $limit = request()->has('limit') ? request()->get('limit') : null;
        return new PermissionCollection(Permission::paginate($limit));
    }

    public function store(Request $request) {
        return new PermissionResource(Permission::create($request->all()));
    }

    public function show(Permission $permission) {
        return new PermissionResource($permission);
    }

    public function update(Request $request, Permission $permission) {
        $permission->update($request->all());
        return new PermissionResource($permission);
    }

    public function destroy(Permission $permission) {
        $permission->delete();
        return response()->json(null, 204);
    }
}
