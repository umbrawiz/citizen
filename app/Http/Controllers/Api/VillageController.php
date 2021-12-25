<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Village;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = auth()->user()->username;
        $villages = Village::whereRaw("code like '$code%'")->orWhere('ward_id','like',$code)->orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $villages
        ]);
    }

    public function render()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.villages.village')->render(),
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

        Village::create([
            'name'  => $request->name,
            'code'  => $type == 'A1' || $type == 'admin' ? $request->code : $code . $request->code,
            'ward_id' => $code,
        ]);

        $villages = Village::whereRaw("code like '$code%'")->orWhere('ward_id','like',$code)->orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $villages
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
        $village = Village::find($request->id);
        return response()->json([
            'status' => 200,
            'data'   => $village
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
        $village = Village::find($request->id);
        $village->name  = $request->name;
        // $village->code  = $request->code;
        $village->save();

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
        $village = Village::find($request->id);
        $village->delete();

        return response()->json([
            'status' => 200,
            'data'   => ''
        ]);
    }
}
