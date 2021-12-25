<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.villages.village');
    }
}
