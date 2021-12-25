<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Declaration;

class ReportController extends Controller
{
    public function reportProvince() 
    {
        return view('admin.reports.report-province');
    }

    public function reportDistrict()
    {
        return view('admin.reports.report-district');
    }

    public function reportWard()
    {
        return view('admin.reports.report-ward');
    }

    public function reportVillage()
    {
        return view('admin.reports.report-village');
    }

    public function searchDeclaration(Request $request)
    {
        $q = $request->q;
        $data = Declaration::whereRaw("name like '%$q%'")->orderBy('created_at', 'DESC')->get();
        return view('admin.declarations.search_reload',compact('data','q'));
    }

    public function showDeclarationProvince(Request $request)
    {
        $code = $request->code;
        $data = Declaration::whereHas('villages', function ($query) use ($code) {
            $query->whereRaw("code like '$code%'");
        })->orderBy('created_at', 'DESC')->get();
        return view('admin.reports.show-province', compact('data'));
    }

    public function showDeclarationDistrict(Request $request)
    {
        $code = $request->code;
        $data = Declaration::whereHas('villages', function ($query) use ($code) {
            $query->whereRaw("code like '$code%'");
        })->orderBy('created_at', 'DESC')->get();
        return view('admin.reports.show-district', compact('data'));
    }

    public function showDeclarationWard(Request $request)
    {
        $code = $request->code;
        $data = Declaration::whereHas('villages', function ($query) use ($code) {
            $query->whereRaw("code like '$code%'");
        })->orderBy('created_at', 'DESC')->get();
        return view('admin.reports.show-ward', compact('data'));
    }

    public function showDeclarationVillage(Request $request)
    {
        $code = $request->code;
        $data = Declaration::where('village_id','like',$code)->get();
        return view('admin.reports.show-village', compact('data'));
    }
}
