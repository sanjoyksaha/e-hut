<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\ChildSubCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subcategory-access'), Response::HTTP_FORBIDDEN);
        $subCategories = SubCategory::latest()->get();
        return view('admin.sub-category.index', compact('subCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('subcategory-create'), Response::HTTP_FORBIDDEN);

        $child_sub_categories = ChildSubCategory::latest()->get();

        return view('admin.sub-category.create', compact( 'child_sub_categories'));
    }

    public function store(SubCategoryRequest $request)
    {
        $sub_category = SubCategory::create($request->all());
        $sub_category->childSubCategories()->sync($request->child_sub_categories);

        return redirect('/admin/sub-category')->with('success', 'Sub Category Added Successfully.');
    }

    public function edit(SubCategory $sub_category)
    {
        abort_if(Gate::denies('subcategory-edit'), Response::HTTP_FORBIDDEN);

        $child_sub_categories = ChildSubCategory::latest()->get();

        return view('admin.sub-category.edit', compact('sub_category', 'child_sub_categories'));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $sub_category)
    {
        $request->has('image') ? SubCategory::deleteImage($sub_category) : '';
        $sub_category->update($request->all());
        $sub_category->childSubCategories()->sync($request->child_sub_categories);

        return redirect('/admin/sub-category')->with('success', 'Sub Category Updated Successfully.');
    }

    public function destroy(SubCategory $sub_category)
    {
        abort_if(Gate::denies('subcategory-delete'), Response::HTTP_FORBIDDEN);

        SubCategory::deleteImage($sub_category);
        $sub_category->childSubCategories()->detach();
        $sub_category->delete();

        return back()->with('success', 'Sub Category Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;
        DB::table('child_sub_category_sub_category')->whereIn('sub_category_id', explode(",", $ids))->delete();
        $sub_categories = SubCategory::whereIn('id', explode(",", $ids))->get();

        foreach($sub_categories as $sub_category)
        {
            SubCategory::deleteImage($sub_category);
        }

        SubCategory::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function subcategoryActive(SubCategory $sub_category)
    {
        $sub_category->status = true;
        $sub_category->save();

        return back()->with('success', 'Sub Category is now active.');
    }

    public function subcategoryInactive(SubCategory $sub_category)
    {
        $sub_category->status = false;
        $sub_category->save();

        return back()->with('error', 'Sub Category is now inactive.');
    }
}
