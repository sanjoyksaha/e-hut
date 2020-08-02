<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        abort_if(Gate::denies('user-access'), Response::HTTP_FORBIDDEN);

        $admin_users = Admin::latest()->get();
        return view('admin.user.index', compact('admin_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        abort_if(Gate::denies('user-create'), Response::HTTP_FORBIDDEN);

        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->all());
        $admin->roles()->sync($request->roles);

        return redirect('/admin/admin_users')->with('success', 'User added successfully.');
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
     * @param Admin $admin_user
     * @return Factory|View
     */
    public function edit(Admin $admin_user)
    {
        abort_if(Gate::denies('user-edit'), Response::HTTP_FORBIDDEN);

        $roles = Role::all();
        return view('admin.user.edit', compact('admin_user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdminRequest $request
     * @param Admin $admin_user
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateAdminRequest $request, Admin $admin_user)
    {
        $admin_user->update($request->all());
        $admin_user->roles()->sync($request->roles);

        return redirect('/admin/admin_users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $admin_user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Admin $admin_user)
    {
        abort_if(Gate::denies('user-delete'), Response::HTTP_FORBIDDEN);
        $admin_user->roles()->detach();
        $admin_user->delete();

        return back()->with('success', 'User deleted successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;

        DB::table('admin_role')->whereIn('admin_id', explode(",", $ids))->delete();
        Admin::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function active(Admin $admin_user)
    {
        $admin_user->status = true;
        $admin_user->save();

        return back()->with('success', 'This user is active now.');
    }

    public function inactive(Admin $admin_user)
    {
        $admin_user->status = false;
        $admin_user->save();

        return back()->with('success', 'This user is inactive now.');
    }
}
