<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

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
    public function index(Role $model)
    {
        // $this->authorize('manage-users', User::class);

        return view('roles.index', ['roles' => $model->all()]);
    }

    /**
     * Show the form for creating a new role
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created role in storage
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Role  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Role $model)
    {   
        $model->create($request->all());

        return redirect()->route('role.index')->withStatus(__('Role successfully created.'));
    }

    /**
     * Show the form for editing the specified role
     *
     * @param  \App\Role  $role
     * @return \Illuminate\View\View
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified role in storage
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        return redirect()->route('role.index')->withStatus(__('Role successfully updated.'));
    }
}
