<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ColorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('color-access'), Response::HTTP_FORBIDDEN);

        $colors = Color::latest()->get();

        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        abort_if(Gate::denies('color-create'), Response::HTTP_FORBIDDEN);

        return view('admin.color.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('color-create'), Response::HTTP_FORBIDDEN);

        $this->validate($request, [
            'name' => 'required',
        ]);

        Color::create($request->all());

        return redirect('/admin/color')->with('success', 'Color Added Successfully.');
    }

    public function edit(Color $color)
    {
        abort_if(Gate::denies('color-edit'), Response::HTTP_FORBIDDEN);

        return view('admin.color.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        abort_if(Gate::denies('color-edit'), Response::HTTP_FORBIDDEN);

        $request->validate([
            'name' => 'required',
        ]);

        $color->update($request->all());

        return redirect('/admin/color')->with('success', 'Color Updated Successfully.');
    }

    public function destroy(Color $color)
    {
        abort_if(Gate::denies('color-delete'), Response::HTTP_FORBIDDEN);

        $color->delete();

        return back()->with('success', 'Color Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;

        Color::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
