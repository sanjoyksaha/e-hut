<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        abort_if(Gate::denies('role-access'), Response::HTTP_FORBIDDEN);

        $roles = Role::latest()->get();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        abort_if(Gate::denies('role-create'), Response::HTTP_FORBIDDEN);

        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect('/admin/role')->with('success', 'Role Updated Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Factory|View
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role-edit'), Response::HTTP_FORBIDDEN);

        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect('/admin/role')->with('success', 'Role Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse|Redirector
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role-delete'), Response::HTTP_FORBIDDEN);

        $role->permissions()->detach();
        $role->delete();
        return back()->with('success', 'Role Updated Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;
        DB::table('permission_role')->whereIn('role_id', explode(',', $ids))->delete();
        Role::whereIn('id', explode(',', $ids))->delete();
        return response(null, \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
    }
}
