<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Cart;

class CouponController extends Controller
{
    // check code coupon
    public function checkcoupon(Request $request)
    {
        $code = $request->data;
        // echo $code;
        // dd($code);
        $coupon = Coupon::where('code', $code)->first();
        // dd($coupon->toArray());
        if ($coupon === null) {
            return response()->json(['status' => 'Mã hết hiệu lực!', 'flag' => 0]);
        } else {
            $time_start = $coupon->time_start;
            $time_end   = $coupon->time_end;
            $time_now   = Carbon::now();
            if ($time_end >= $time_now && $time_start <= $time_now) {
                $percent = (int) $coupon->percent;
                $percent = $request->session()->put('percent', $percent);
                $code    = $request->session()->put('code', $code);
                // echo $percent;
                return response()->json(['percent' => $percent, 'code' => $code, 'flag' => 1]);
            } else {
                return response()->json(['status' => 'Mã hết hiệu lực!', 'flag' => 0]);
            }
        }
    }

    // Ajax load page infocart
    public function loadPage()
    {
        return view('frontend.orders.infocart');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
