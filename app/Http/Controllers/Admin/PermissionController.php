<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        abort_if(Gate::denies('permission-access'), Response::HTTP_FORBIDDEN);

        $permissions = Permission::latest()->get();
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        abort_if(Gate::denies('permission-create'), Response::HTTP_FORBIDDEN);

        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(PermissionRequest $request)
    {
        Permission::create($request->all());

        return redirect('/admin/permission')->with('success', 'Permission Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return Factory|View
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission-edit'), Response::HTTP_FORBIDDEN);

        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePermissionRequest $request
     * @param Permission $permission
     * @return RedirectResponse|Redirector
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect('/admin/permission')->with('success', 'Permission Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission-delete'), Response::HTTP_FORBIDDEN);

        $permission->delete();

        return redirect('/admin/permission')->with('success', 'Permission Deleted Successfully.');
    }

    public function massDelete(Request $request)
     {
         $slugs = $request->slugs;

         Permission::whereIn('slug', explode(",", $slugs))->delete();

         return response(null, Response::HTTP_NO_CONTENT);
     }
}
