<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Declaration;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use App\Models\Ward;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportProvince()
    {
        $code = auth()->user()->username;

        if (auth()->user()->type == 'admin' || auth()->user()->type == 'A1') {
            $provinces = Province::orderBy('created_at', 'DESC')->get();
        } else {
            $provinces = Province::whereRaw("code like '$code%'")->orderBy('created_at', 'DESC')->get();
        }

        foreach ($provinces as $key => $value) {
            $provinces[$key]['declarations'] = $value->declarations()->count();
        }

        return response()->json([
            'status' => 200,
            'data'   => $provinces->toArray()
        ]);
    }

    public function reportDistrict()
    {
        $code = auth()->user()->username;
        if (auth()->user()->type == 'admin' || auth()->user()->type == 'A1') {
            $districts = District::orderBy('created_at', 'DESC')->get();
        } else {
            $districts = District::whereRaw("code like '$code%'")->orWhere('province_id','like',$code)->orderBy('created_at', 'DESC')->get();
        }

        foreach ($districts as $key => $value) {
            $districts[$key]['declarations'] = $value->declarations()->count();
        }

        return response()->json([
            'status' => 200,
            'data'   => $districts->toArray()
        ]);
    }

    public function reportWard()
    {
        $code = auth()->user()->username;
        if (auth()->user()->type == 'admin' || auth()->user()->type == 'A1') {
            $wards = Ward::withCount('declarations')->orderBy('created_at', 'DESC')->get();
        } else {
            $wards = Ward::withCount('declarations')->whereRaw("code like '$code%'")->orWhere('district_id','like',$code)->orderBy('created_at', 'DESC')->get();
        }

        return response()->json([
            'status' => 200,
            'data'   => $wards->toArray()
        ]);
    }

    public function reportVillage()
    {
        $code = auth()->user()->username;
        if (auth()->user()->type == 'admin' || auth()->user()->type == 'A1') {
            $villages = Village::withCount('declarations')->orderBy('created_at', 'DESC')->get();
        } else {
            $villages = Village::withCount('declarations')->whereRaw("code like '$code%'")->orWhere('ward_id','like',$code)->orderBy('created_at', 'DESC')->get();
        }

        return response()->json([
            'status' => 200,
            'data'   => $villages->toArray()
        ]);
    }

    public function showDeclarationProvince(Request $request)
    {
        $code = $request->code;
        $data = [];
        return response()->json([
            'status' => 200,
            'data'   => view('admin.reports.show', compact('data'))->render()
        ]);
    }

    public function showDeclarationDistrict(Request $request)
    {
        $code = $request->code;
        $data = [];
        return response()->json([
            'status' => 200,
            'data'   => view('admin.reports.show', compact('data'))->render()
        ]);
    }

    public function showDeclarationWard(Request $request)
    {
        $code = $request->code;
        $data = [];
        return response()->json([
            'status' => 200,
            'data'   => view('admin.reports.show', compact('data'))->render()
        ]);
    }

    public function showDeclarationVillage(Request $request)
    {
        $code = $request->code;
        $data = Declaration::join('villages','declarations.village_id','=','villages.id')->get(['declarations.*','villages.name AS village_name']);
        return response()->json([
            'status' => 200,
            'data'   => view('admin.reports.show', compact('data'))->render()
        ]);
    }

    public function searchWithName(Request $request)
    {
        $q = $request->declaration_name;
        $data = Declaration::whereRaw("name like '%$q%'")->orderBy('created_at', 'DESC')->get();

        return response()->json([
            'status' => 200,
            'data'   => view('admin.declarations.search', compact('data', 'q'))->render()
        ]);
    }

    public function renderProvince()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.reports.report-province')->render()
        ]);
    }

    public function renderDistrict()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.reports.report-district')->render()
        ]);
    }

    public function renderWard()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.reports.report-ward')->render()
        ]);
    }

    public function renderVillage()
    {
        return response()->json([
            'status' => 200,
            'data'   => view('admin.reports.report-village')->render()
        ]);
    }
}
