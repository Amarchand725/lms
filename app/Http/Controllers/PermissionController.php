<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Permission::orderby('id', 'desc')->paginate(10);
        return view('permissions.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('permissions.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $bool = false;
        if(!empty($request->permissions)){
            foreach($request->permissions as $permission){
                $ifnotfound = Permission::where('name', Str::lower($request->name).'-'.$permission)->first();
                if(empty($ifnotfound)){
                    Permission::create([
                        'name' =>  str_replace(' ', '-', Str::lower($request->name)).'-'.$permission,
                        'guard_name' => 'web',
                        'permission' => $permission,
                    ]);
                }else{
                    $bool = true;
                }
            }
        }else{
            $bool = false;
            Permission::create([
                'name' =>  str_replace(' ', '-', Str::lower($request->name)).'-'.$permission,
                'guard_name' => $request->name,
                'permission' => $permission,
            ]);
        }

        if($bool){
            return redirect()->route('permission.index')
            ->with('message','You have already available these permissions.');
        }

        return redirect()->route('permission.index')->withStatus(__('Permission created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Permission::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission->name = str_replace(' ', '-', Str::lower($request->name)).'-'.$request->permission;
        $permission->save();

        return redirect()->route('permission.index')->withStatus(__('Permission updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $ifdeleted = $permission->delete();
        if($ifdeleted){
            return redirect()->route('permission.index')->withStatus(__('Permission deleted successfully.'));
        }
    }
}
