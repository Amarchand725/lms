<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use DB;

class RoleController extends Controller
{
    /* public function __construct()
    {
        $this->authorizeResource(Role::class);
    } */

    /**
     * Display a listing of the roles
     *
     * @param \App\Role  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::orderby('id', 'desc')->paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }

    /**
     * Store a newly created role in storage
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Role  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {   
        $rules = ([
            'name' => ['required', 'unique:roles'],
        ]);

        $this->validate($request, $rules);

        $role = Role::create(['name' => $request->name, 'description'=>$request->description]);
        // $role->syncPermissions($request->input('permission'));

        \LogActivity::addToLog('Role Added');
        return redirect()->route('role.index')->withStatus(__('Role successfully created.'));
    }

    /**
     * Show the form for editing the specified role
     *
     * @param  \App\Role  $role
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified role in storage
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $role_id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($role_id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->syncPermissions($request->input('permission'));

        \LogActivity::addToLog('Role Updated');
        return redirect()->route('role.index')->withStatus(__('Role successfully updated.'));
    }
}
