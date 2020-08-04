<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildSubCategoryRequest;
use App\Http\Requests\UpdateChildSubCategoryRequest;
use App\Models\ChildSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ChildSubCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('childsubcategory-access'), Response::HTTP_FORBIDDEN);

        $childSubCategories = ChildSubCategory::latest()->get();

        return view('admin.child-sub-category.index', compact('childSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('childsubcategory-create'), Response::HTTP_FORBIDDEN);

        return view('admin.child-sub-category.create');
    }

    public function store(ChildSubCategoryRequest $request)
    {
        ChildSubCategory::create($request->all());

        return redirect('/admin/child-sub-category')->with('success', 'Child Sub-Category Is Added Successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(ChildSubCategory $child_sub_category)
    {
        abort_if(Gate::denies('childsubcategory-edit'), Response::HTTP_FORBIDDEN);

        return view('admin.child-sub-category.edit', compact('child_sub_category'));
    }

    public function update(UpdateChildSubCategoryRequest $request, ChildSubCategory $child_sub_category)
    {
        $request->has('image') ? ChildSubCategory::deleteImage($child_sub_category) : '';

        $child_sub_category->update($request->all());

        return redirect('/admin/child-sub-category')->with('success', 'Child Sub-Category Is Updated Successfully.');
    }

    public function destroy(ChildSubCategory $child_sub_category)
    {
        abort_if(Gate::denies('childsubcategory-delete'), Response::HTTP_FORBIDDEN);

        ChildSubCategory::deleteImage($child_sub_category);
        $child_sub_category->delete();

        return back()->with('success', 'Child Sub-Category Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;
        $child_sub_categories = ChildSubCategory::whereIn('id', explode(",", $ids))->get();

        foreach($child_sub_categories as $child_sub_category)
        {
            ChildSubCategory::deleteImage($child_sub_category);
        }

        ChildSubCategory::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function active(ChildSubCategory $child_sub_category)
    {
        $child_sub_category->status = true;
        $child_sub_category->save();

        return back()->with('success', 'Child Sub-Category is now active.');
    }

    public function inactive(ChildSubCategory $child_sub_category)
    {
        $child_sub_category->status = false;
        $child_sub_category->save();

        return back()->with('error', 'Child Sub-Category is now inactive.');
    }
}
