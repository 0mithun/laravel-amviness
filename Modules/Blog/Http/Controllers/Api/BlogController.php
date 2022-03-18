<?php

namespace Modules\Blog\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;
use Modules\Category\Entities\Category;

class BlogController extends Controller
{
    /**
     *
     * @param  Blog
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function index()
    {
        try {
            $data = Post::with('category')->latest('id')->paginate(10);
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }
    /**
     *
     * @param  Blog
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function blogindex()
    {
        try {
            $data = Category::oldest('order')->get();
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }

    /**
     *
     * @param  Blog
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     *
     * @param  Blog
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     *
     * @param  Blog
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function show($id)
    {
        try {
            $data = Post::whereId($id)->with('category')->first();

            if ($data) {
                return sendSuccessResponse($data);
            } else {
                return sendErrorResponse([], 'Data Not Foun', 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }

    /**
     *
     * @param  Blog
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function edit($id)
    {
        return view('blog::edit');
    }

    /**
     *
     * @param  Blog
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     *
     * @param  Blog
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
