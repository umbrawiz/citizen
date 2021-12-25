<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Declaration;
use Illuminate\Http\Request;

class DeclarationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.declarations.declarations');
    }

    public function print(Request $request)
    {
        $declaration = Declaration::find($request->id);
        return view('admin.declarations.print', compact('declaration'));
    }
}
