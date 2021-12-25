<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ward;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = auth()->user()->username;
        $wards = Ward::whereRaw("code like '$code%'")->orWhere('district_id','like',$code)->orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $wards
        ]);
    }

    public function render()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.wards.ward')->render(),
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

        Ward::create([
            'name'  => $request->name,
            'code'  => $type == 'A1' || $type == 'admin' ? $request->code : $code . $request->code,
            'district_id' => $code,
        ]);

        $wards = Ward::whereRaw("code like '$code%'")->orWhere('district_id','like',$code)->orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $wards
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
        $ward = Ward::find($request->id);
        return response()->json([
            'status' => 200,
            'data'   => $ward
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
        $ward = Ward::find($request->id);
        $ward->name  = $request->name;
        $ward->code  = $type == 'A1' || $type == 'admin' ? $request->code : $code . $request->code;
        $ward->save();

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
        $ward = Ward::find($request->id);
        $ward->delete();

        return response()->json([
            'status' => 200,
            'data'   => ''
        ]);
    }
}
