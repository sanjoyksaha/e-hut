<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('size-access'), Response::HTTP_FORBIDDEN);

        $sizes = Size::latest()->get();

        return view('admin.size.index', compact('sizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('size-create'), Response::HTTP_FORBIDDEN);

        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('size-create'), Response::HTTP_FORBIDDEN);

        $this->validate($request, [
            'name' => 'required',
        ]);

        Size::create($request->all());

        return redirect('/admin/size')->with('success', 'Size Added Successfully.');
    }

    public function edit(Size $size)
    {
        abort_if(Gate::denies('size-edit'), Response::HTTP_FORBIDDEN);

        return view('admin.size.edit', compact('size'));
    }

    public function update(Request $request, Size $size)
    {
        abort_if(Gate::denies('size-edit'), Response::HTTP_FORBIDDEN);

        $request->validate([
            'name' => 'required',
        ]);

        $size->update($request->all());

        return redirect('/admin/size')->with('success', 'Size Updated Successfully.');
    }

    public function destroy(Size $size)
    {
        abort_if(Gate::denies('size-delete'), Response::HTTP_FORBIDDEN);

        $size->delete();

        return back()->with('success', 'Size Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;

        Size::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
