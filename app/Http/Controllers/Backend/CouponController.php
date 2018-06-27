<?php

namespace App\Http\Controllers\Backend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = DB::table('coupons')->select('id', 'code', 'percent', 'description', 'time_start', 'time_end')->get();
        return view('backend.coupons.index', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'        => 'required',
            'description' => 'required',
            'percent'     => 'required',
            'time_start'  => 'required',
            'time_end'    => 'required',
        ]);
        $coupon              = new Coupon;
        $coupon->code        = $request->code;
        $coupon->percent     = $request->percent;
        $coupon->description = $request->description;
        $coupon->time_start  = $request->time_start;
        $coupon->time_end    = $request->time_end;
        $coupon->save();
        return redirect()->route('admin.coupon');
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
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('backend.coupons.edit', ['coupon' => $coupon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'        => 'required',
            'description' => 'required',
            'percent'     => 'required',
            'time_start'  => 'required',
            'time_end'    => 'required',
        ]);
        $dataForm = [
            'id'          => $request->id,
            'code'        => $request->code,
            'description' => $request->description,
            'percent'     => $request->percent,
            'time_start'  => $request->time_start,
            'time_end'    => $request->time_end,
            'updated_at'  => Carbon::now()
        ];
        DB::table('coupons')
            ->where('id', $request->id)
            ->update($dataForm);
        return redirect()->route('admin.coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        DB::table('coupons')->where('id', '=', $id)->delete();
        return redirect()->route('admin.coupon');
    }
}
