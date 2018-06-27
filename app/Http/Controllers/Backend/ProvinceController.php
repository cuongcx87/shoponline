<?php

namespace App\Http\Controllers\Backend;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // districts_province_id_foreign
    public function index()
    {
        $provinces = Province::all();
        return view('backend.provinces.index', ['provinces' => $provinces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.provinces.create');
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
            'name'       => 'required|unique:provinces',
        ]);
        $province             = new Province;
        $province->name       = $request->name;
        $province->created_at = new DateTime;
        $province->updated_at = new DateTime;

        $province->save();
        return redirect()->back();
        // return redirect()->route('admin.province');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $province = Province::where('name', $name)->first();
        $districts = $province->districts;
        return view('backend.provinces.show', ['province' => $province, 'districts' => $districts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        DB::table('provinces')->where('name', '=', $name)->delete();

        return redirect()->route('admin.province');
    }
}
