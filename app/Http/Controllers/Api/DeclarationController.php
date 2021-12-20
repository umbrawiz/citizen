<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Declaration;

class DeclarationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $declarations = Declaration::all();
        return response()->json([
            'status' => 200,
            'data'   => view('admin.declarations.declarations', compact('declarations'))->render()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.declarations.add')->render()
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
        Declaration::create([
            'identity_card'  => $request->identity_card,
            'name'  => $request->name,
            'birthday' => $request->birthday,
            'sex' => $request->sex,
            'country' => $request->country,
            'permanent_address' => $request->permanent_address,
            'temporary_address' => $request->temporary_address,
            'religion' => $request->religion,
            'education' => $request->education,
            'job' => $request->job
        ]);
        $declarations = Declaration::all();
        return response()->json([
            'status' => 200,
            'data'   => view('admin.declarations.list', compact('declarations'))->render()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $declaration = Declaration::find($id);
        return response()->json([
            'status' => 200,
            'data'   => view('admin.declarations.edit', compact('declaration'))->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $declaration = Declaration::find($id);
        $declaration->identity_card  = $request->identity_card;
        $declaration->name  = $request->name;
        $declaration->birthday = $request->birthday;
        $declaration->sex = $request->sex;
        $declaration->country = $request->country;
        $declaration->permanent_address = $request->permanent_address;
        $declaration->temporary_address = $request->temporary_address;
        $declaration->religion = $request->religion;
        $declaration->education = $request->education;
        $declaration->job = $request->job;
        $declaration->save();
        $declarations = Declaration::all();
        return response()->json([
            'status' => 200,
            'data'   => view('admin.declarations.list', compact('declarations'))->render()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $declaration = Declaration::find($id);
        $declaration->delete();
        $declarations = Declaration::all();
        return response()->json([
            'status' => 200,
            'data'   => view('admin.declarations.list', compact('declarations'))->render()
        ]);
    }
}
