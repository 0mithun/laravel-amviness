<?php

namespace Modules\Wishlist\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Wishlist\Entities\Wishlist;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $wishlists = Wishlist::WhereHas('product')->get();
        return view('wishlist::index', compact('wishlists'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlistDelete = $wishlist->delete();

        if ($wishlistDelete) {
            flashSuccess('Wishlist Deleted Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }
}
