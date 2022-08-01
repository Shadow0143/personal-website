<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Auth;
use App\Models\Section_item;

class ApiContoller extends Controller
{
    public function editSectionApi(Request $request)
    {

        // return $request;
        $section = Section_item::where('user_id',$request->id)->where('section_id',$request->sectionId)->get();
        return response()->json($section);
    }
}
