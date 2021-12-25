<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            $admins = Admin::orderBy('created_at', 'DESC')->get()->toArray();
        } elseif (auth()->user()->type == 'A1') {
            $admins = Admin::where('type', '!=', 'admin')->orderBy('created_at', 'DESC')->get()->toArray();
        } else {
            $code = auth()->user()->username;
            $admins = Admin::whereRaw("username like '$code%'")->where('id','<>',auth()->user()->id)->get();
        }

        foreach ($admins as $key => $admin) {
            $admins[$key]['is_declaration'] = $admin['is_declaration'] == 1 ? 'Được khai báo' : 'Khóa khai báo';
        }

        return response()->json([
            'status' => 200,
            'data'   => $admins
        ]);
    }

    public function render()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.admins.admins')->render()
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
        $parent_id = null;
        switch (auth()->user()->type) {

            case 'admin':
                $type = 'A1';
                $role_id = 2;
                break;

            case 'A1':
                $type = 'A2';
                $role_id = 3;
                break;

            case 'A2':
                $type = 'A3';
                $role_id = 4;
                $parent_id = auth()->user()->id;
                break;

            case 'A3':
                $type = 'B1';
                $role_id = 5;
                $parent_id = auth()->user()->id;
                break;

            case 'B1':
                $type = 'B2';
                $role_id = 6;
                $parent_id = auth()->user()->id;
                break;
        }

        $admin = Admin::create([
            'username'  => $request->username,
            'password'  => bcrypt($request->password),
            'type' => $type,
            'role_id' => $role_id,
            'is_declaration' => 1,
            'parent_id' => $parent_id,
        ]);

        $admin->assignRole($type);

        $admins = Admin::orderBy('created_at', 'DESC')->get()->toArray();
        return response()->json([
            'status' => 200,
            'data'   => $admins
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
        $admin = Admin::find($request->id);
        return response()->json([
            'status' => 200,
            'data'   => $admin
        ]);
    }

    public function removeRole($id)
    {
        $admins = Admin::where('parent_id', $id)->orderBy('created_at', 'DESC')->get();

        // $admins = Admin::where('id', $id)->orderBy('created_at', 'DESC')->get();

        if ($admins->count() > 0) {
            foreach ($admins as $value) {
                $value->removeRole($value->type);
                $value->update(['is_declaration' => 0]);
                $this->removeRole($value->id);
            }
        }

        return;
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
        $admin = Admin::find($request->id);
        $admin->username  = $request->username;
        $admin->is_declaration = $request->is_declaration;
        $admin->save();

        if ($request->is_declaration == 0) {
            $admin->removeRole($admin->type);
        } else {
            $admin->assignRole($admin->type);
        }

        if ($admin->type !== 'admin' && $admin->type !== 'A1' && $request->is_declaration == 0) {
            $admin->removeRole($admin->type);
            $this->removeRole($admin->id);
        }

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
        $admin = Admin::find($request->id);
        $admin->delete();

        return response()->json([
            'status' => 200,
            'data'   => ''
        ]);
    }
}
