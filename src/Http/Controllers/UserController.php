<?php
namespace Valiria\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Valiria\Auth\Http\Resources\UserCollection;
use Valiria\Auth\Http\Resources\UserResource;
use Valiria\Auth\Models\Role;
use Valiria\Auth\Models\User;
use Valiria\Http\Controllers\Controller;

class UserController extends Controller {

    public function index() {
        $limit = request()->has('limit') ? request()->get('limit') : null;
        return new UserCollection(User::paginate($limit));
    }

    public function store(Request $request){
        return new UserResource(User::create($request->all()));
    }

    public function show(User $user) {
        return new UserResource($user);
    }

    public function update(Request $request, User $user) {
        $user->update($request->all());
        return new UserResource($user);
    }

    public function destroy(User $user) {
        $user->delete();
        return response()->json(null, 204);
    }
}
