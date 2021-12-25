<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $provinces
        ]);
    }

    public function render()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.provinces.province')->render(),
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
        Province::create([
            'name'  => $request->name,
            'code'  => $request->code
        ]);
        $provinces = Province::orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $provinces
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
        $province = Province::find($request->id);
        return response()->json([
            'status' => 200,
            'data'   => $province
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
        $province = Province::find($request->id);
        $province->name  = $request->name;
        $province->code  = $request->code;
        $province->save();

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
        $province = Province::find($request->id);
        $province->delete();

        return response()->json([
            'status' => 200,
            'data'   => ''
        ]);
    }
}
