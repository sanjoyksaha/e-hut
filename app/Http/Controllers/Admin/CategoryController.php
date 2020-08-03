<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category-access'), Response::HTTP_FORBIDDEN);
        $categories = Category::latest()->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('category-create'), Response::HTTP_FORBIDDEN);
        $sub_categories =  SubCategory::latest()->get();

        return view('admin.category.create', compact('sub_categories'));
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        $category->subCategories()->sync($request->sub_categories);
        return redirect('/admin/category')->with('success', 'Category Added Successfully.');
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category-edit'), Response::HTTP_FORBIDDEN);
        $sub_categories =  SubCategory::latest()->get();

        return view('admin.category.edit', compact('category', 'sub_categories'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->has('image') ? Category::deleteImage($category) : '';
        $category->update($request->all());
        $category->subCategories()->sync($request->sub_categories);

        return redirect('/admin/category')->with('success', 'Category Updated Successfully.');
    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category-delete'), Response::HTTP_FORBIDDEN);
        Category::deleteImage($category);
        $category->subCategories()->detach();
        $category->delete();

        return back()->with('success', 'Category Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;
        DB::table('category_sub_category')->whereIn('category_id', explode(",", $ids))->delete();
        $categories = Category::whereIn('id', explode(",", $ids))->get();

        foreach($categories as $category)
        {
            Category::deleteImage($category);
        }

        Category::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function categoryActive(Category $category)
    {
        $category->status = true;
        $category->save();

        return back()->with('success', 'Category is now active.');
    }

    public function categoryInactive(Category $category)
    {
        $category->status = false;
        $category->save();

        return back()->with('error', 'Category is now inactive.');
    }
}
