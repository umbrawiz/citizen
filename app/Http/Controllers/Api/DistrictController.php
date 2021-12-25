<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = auth()->user()->username;
        $districts = District::whereRaw("code like '$code%'")->orWhere('province_id','like',$code)->orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $districts
        ]);
    }

    public function render()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.districts.district')->render(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $code = auth()->user()->username;
        $type = auth()->user()->type;

        District::create([
            'name'  => $request->name,
            'code'  => $type == 'A1' || $type == 'admin' ? $request->code : $code . $request->code,
            'province_id' => $code,
        ]);

        $districts = District::whereRaw("code like '$code%'")->orWhere('province_id','like',$code)->orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $districts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $district = District::find($request->id);
        return response()->json([
            'status' => 200,
            'data'   => $district
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $type = auth()->user()->type;
        $code = auth()->user()->username;
        $district = District::find($request->id);
        $district->name  = $request->name;
        $district->code  = $type == 'A1' || $type == 'admin' ? $request->code : $code . $request->code;
        $district->save();

        return response()->json([
            'status' => 200,
            'data'   => ''
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $district = District::find($request->id);
        $district->delete();

        return response()->json([
            'status' => 200,
            'data'   => ''
        ]);
    }
}
