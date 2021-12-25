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
        $code = auth()->user()->username;
        if (auth()->user()->type == 'admin' || auth()->user()->type == 'A1') {
            $declarations = Declaration::orderBy('created_at', 'DESC')->get()->toArray();
        } else {
            $declarations = Declaration::whereHas('villages', function ($query) use ($code) {
                $query->whereRaw("code like '$code%'");
            })->orderBy('created_at', 'DESC')->get()->toArray();
        }

        foreach ($declarations as $key => $value) {
            $declarations[$key]['sex'] = $value['sex'] == 0 ? 'Nam' : 'Nữ';
            $declarations[$key]['religion'] = $value['religion'] == 0 ? 'Phật giáo' : ($value['religion'] == 1 ? 'Thiên chúa giáo' : 'Khác');
        }
        return response()->json([
            'status' => 200,
            'data'   => $declarations
        ]);
    }

    public function render()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.declarations.declarations')->render()
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
            'job' => $request->job,
            'village_id' => auth()->user()->username
        ]);
        $declarations = Declaration::orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $declarations
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
    public function edit(Request $request)
    {
        $declaration = Declaration::find($request->id);
        return response()->json([
            'status' => 200,
            'data'   => $declaration
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
        $declaration = Declaration::find($request->id);
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
        $declaration->village_id = auth()->user()->username;
        $declaration->save();
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
        $declaration = Declaration::find($request->id);
        $declaration->delete();
        return response()->json([
            'status' => 200,
            'data'   => ''
        ]);
    }

    public function print(Request $request)
    {
        $declaration = Declaration::find($request->id);
        return response()->json([
            'status' => 200,
            'data'   => view('admin.declarations.print', compact('declaration'))->render()
        ]);
    }
}
