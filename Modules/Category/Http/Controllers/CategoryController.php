<?php

namespace Modules\Category\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Illuminate\Contracts\Support\Response;
use Modules\Category\Actions\UpdateCategory;
use Modules\Category\Actions\SortingCategory;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Category\Http\Requests\CategoryFormRequest;
use Modules\Category\Repositories\CategoryRepositories;

class CategoryController extends Controller
{
    use ValidatesRequests;
    public $user;
    protected $category;

    public function __construct(CategoryRepositories $category)
    {
        $this->category = $category;
        // $this->middleware(function ($request, $next) {
        //     $this->user = Auth::guard('super_admin')->user();
        //     return $next($request);
        // });
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // permission('category.view');
        // $categories = $this->category->all();
        $categories = Category::oldest('order')->get();
        return view('category::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // permission('category.create');
        return view('category::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        // return $request;
        // permission('category.create');

        try {
            $this->category->store($request);

            flashSuccess('Category Added Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        // permission('category.view');
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // permission('category.edit');
        return view('category::category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryFormRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        // permission('category.edit');
        try {
            UpdateCategory::update($request, $category);
            flashSuccess('Category Updated Successfully');
            return redirect(route('module.category.index'));
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Category $category)
    {
        // permission('category.delete');
        try {
            $this->category->destroy($category);
            flashSuccess('Category Deleted Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param $request
     * @return Response
     */
    public function updateOrder(Request $request)
    {
        // permission('category.create');

        try {
            SortingCategory::sort($request);
            return response()->json(['message' => 'Category Sorted Successfully!']);
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }
}
