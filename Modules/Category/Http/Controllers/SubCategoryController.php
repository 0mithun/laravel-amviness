<?php

namespace Modules\Category\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Category\Entities\SubCategory;
use Illuminate\Contracts\Support\Renderable;
use Modules\Category\Actions\DeleteSubCategory;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Modules\Category\Actions\CreateSubCategory;
use Modules\Category\Http\Requests\SubCategoryFormRequest;
use Modules\Category\Actions\MultipleDeleteSubCategory;
use Modules\Category\Actions\UpdateSubCategory;

class SubCategoryController extends Controller
{
    use ValidatesRequests;

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('super_admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // permission('category.view');
        $sub_categories = SubCategory::latest()->get();
        return view('category::subcategory.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // permission('category.create');
        $categories = Category::all();
        return view('category::subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param SubCategoryFormRequest $request
     * @return Renderable
     */
    public function store(SubCategoryFormRequest $request)
    {
        // permission('category.create');
        $subcategory = CreateSubCategory::create($request);

        if ($subcategory) {
            flashSuccess('SubCategory Added Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(int $id)
    {
        // permission('category.view');
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(SubCategory $subcategory)
    {
        // permission('category.edit');
        $categories = Category::all();
        return view('category::subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param SubCategoryFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(SubCategoryFormRequest $request, SubCategory $subcategory)
    {
        // permission('category.edit');
        $subcategory = UpdateSubCategory::update($request, $subcategory);

        if ($subcategory) {
            flashSuccess('SubCategory Updated Successfully');
            return redirect(route('module.subcategory.index'));
        } else {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(SubCategory $subcategory)
    {
        // permission('category.delete');
        $subcategory = DeleteSubCategory::delete($subcategory);

        if ($subcategory) {
            flashSuccess('SubCategory Deleted Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }

    public function multipleDestroy(Request $request)
    {
        // permission('category.delete');
        $subcategory = MultipleDeleteSubCategory::delete($request);

        if ($subcategory) {
            return response()->json(['message' => 'Selected Category Items Deleted Successfully!']);
        } else {
            flashError();
            return back();
        }
    }
}
