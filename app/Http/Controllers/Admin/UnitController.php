<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UnitController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('unit-access'), Response::HTTP_FORBIDDEN);

        $units = Unit::latest()->get();

        return view('admin.unit.index', compact('units'));
    }

    public function create()
    {
        abort_if(Gate::denies('unit-create'), Response::HTTP_FORBIDDEN);

        return view('admin.unit.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('unit-create'), Response::HTTP_FORBIDDEN);

        $this->validate($request, [
            'name' => 'required',
        ]);

        Unit::create($request->all());

        return redirect('/admin/unit')->with('success', 'Unit Added Successfully.');
    }

    public function edit(Unit $unit)
    {
        abort_if(Gate::denies('unit-edit'), Response::HTTP_FORBIDDEN);

        return view('admin.unit.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        abort_if(Gate::denies('unit-edit'), Response::HTTP_FORBIDDEN);

        $request->validate([
            'name' => 'required',
        ]);

        $unit->update($request->all());

        return redirect('/admin/unit')->with('success', 'Unit Updated Successfully.');
    }

    public function destroy(Unit $unit)
    {
        abort_if(Gate::denies('unit-delete'), Response::HTTP_FORBIDDEN);

        $unit->delete();

        return back()->with('success', 'Unit Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;

        Unit::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
