<?php

namespace Modules\Coupon\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Coupon\Entities\Coupon;
use Modules\Coupon\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('coupon::index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupon::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CouponRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        try {
            Coupon::create($request->validated());

            flashSuccess('Coupon Created Successfully!');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('coupon::edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CouponRequest $request
     * @param Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        try {
            $coupon->update($request->validated());

            flashSuccess('Coupon Updated Successfully!');
            return redirect()->route('coupon.index');
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        try {
            $coupon->delete();

            flashSuccess('Coupon Deleted Successfully!');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Status change list from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        try {
            Coupon::findOrFail($request->id)->update(['status' => $request->status]);

            if ($request->status == 1) {
                return responseSuccess('Coupon Activated Successfully');
            } else {
                return responseSuccess('Coupon Inactivated Successfully');
            }
        } catch (\Exception $e) {
            return responseError();
        }
    }
}
