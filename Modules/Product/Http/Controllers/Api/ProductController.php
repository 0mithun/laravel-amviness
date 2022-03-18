<?php

namespace Modules\Product\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;

class ProductController extends Controller
{
    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function index()
    {
        try {
            $data = Product::where('status', 1)->with('category')->with('brand')->latest('id')->paginate(15);
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }
    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function newproduct()
    {
        try {
            $data = Product::with('category')->with('brand')->latest('id')->take(20)->get();
            return sendSuccessResponse([
                'data' => $data,
                'dataproduct' => 'new'
            ]);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }

    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function create()
    {
    }

    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function store(Request $request)
    {
    }

    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function show($id)
    {        // return "1sdjkfghsdfi";
        try {
            $data = Product::whereId($id)->with('galleries', 'brand')->first();
            if ($data) {
                return sendSuccessResponse($data);
            } else {
                return sendErrorResponse([], 'Data Not Foun', 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }


    public function relatedShow()
    {
        return "gerdtgergterd";
    }


    public function edit($id)
    {
    }

    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function update(Request $request, $id)
    {
    }

    /**
     *
     * @param  Product
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function destroy($id)
    {
    }
}
