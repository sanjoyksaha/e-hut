<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SupplierController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('supplier-access'), Response::HTTP_FORBIDDEN);

        $suppliers = Supplier::latest()->get();

        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        abort_if(Gate::denies('supplier-create'), Response::HTTP_FORBIDDEN);

        return view('admin.supplier.create');
    }

    public function store(SupplierRequest $request)
    {
        Supplier::create($request->all());

        return redirect('/admin/supplier')->with('success', 'Supplier Added Successfully');
    }

    public function show(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier-access'), Response::HTTP_FORBIDDEN);

        return view('admin.supplier.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier-edit'), Response::HTTP_FORBIDDEN);

        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $request->image ? Supplier::deleteImage($supplier) : '';
        $supplier->update($request->all());

        return redirect('/admin/supplier')->with('success', 'Supplier Updated Successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier-delete'), Response::HTTP_FORBIDDEN);

        Supplier::deleteImage($supplier);
        $supplier->delete();

        return back()->with('success', 'Supplier Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;
        $supplier = Supplier::whereIn('id', explode(",", $ids))->get();

        foreach($supplier as $supplier)
        {
            Supplier::deleteImage($supplier);
        }

        Supplier::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function active(Supplier $supplier)
    {
        $supplier->status = true;
        $supplier->save();

        return back()->with('success', 'Supplier is now active.');
    }

    public function inactive(Supplier $supplier)
    {
        $supplier->status = false;
        $supplier->save();

        return back()->with('error', 'Supplier is now inactive.');
    }
}
