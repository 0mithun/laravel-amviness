<?php

namespace Modules\Banner\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Banner\Entities\Banner;

class BannerController extends Controller
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
            $data = Banner::all();
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
        return view('banner::create');
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
        return view('banner::show');
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
        return view('banner::edit');
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
