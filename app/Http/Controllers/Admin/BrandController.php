<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('brand-access'), Response::HTTP_FORBIDDEN);

        $brands = Brand::latest()->get();

        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        abort_if(Gate::denies('brand-create'), Response::HTTP_FORBIDDEN);

        return view('admin.brand.create');
    }

    public function store(BrandRequest $request)
    {
        Brand::create($request->all());

        return redirect('/admin/brand')->with('success', 'Brand Added Successfully.');
    }

    public function show(Brand $brand)
    {
        abort_if(Gate::denies('brand-access'), Response::HTTP_FORBIDDEN);

        return view('admin.brand.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        abort_if(Gate::denies('brand-edit'), Response::HTTP_FORBIDDEN);

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $request->image ? Brand::deleteImage($brand) : '';
        $brand->update($request->all());

        return redirect('/admin/brand')->with('success', 'Brand Updated Successfully.');
    }

    public function destroy(Brand $brand)
    {
        abort_if(Gate::denies('brand-delete'), Response::HTTP_FORBIDDEN);

        Brand::deleteImage($brand);
        $brand->delete();

        return back()->with('success', 'Brand Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;
        $brands = Brand::whereIn('id', explode(",", $ids))->get();

        foreach($brands as $brand)
        {
            Brand::deleteImage($brand);
        }

        Brand::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function active(Brand $brand)
    {
        $brand->status = true;
        $brand->save();

        return back()->with('success', 'Brand is now active.');
    }

    public function inactive(Brand $brand)
    {
        $brand->status = false;
        $brand->save();

        return back()->with('error', 'Brand is now inactive.');
    }
}
