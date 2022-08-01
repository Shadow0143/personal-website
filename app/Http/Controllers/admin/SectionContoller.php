<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Section_item;

class SectionContoller extends Controller
{
    public function createSection(Request $request){
        $section= new Section;
        $section->section_name = $request->sectionName;
        $section->sequence = $request->sequence;
        $section->save();
        return view('home');
    }
    public function createSectionItem(Request $request){
        $image = "";
        if($request->file('filename')) {
            $file = $request->file('filename');
            $image = time().'.'.$request->file('filename')->extension();
            $location = 'package';
            $file->move($location,$image);
        }
        $section_item= new Section_item;
        $section_item->section_item_name = $request->itemName;
        $section_item->section_item_value = $request->itemValue;
        $section_item->section_item_value = $request->textarea;
        $section_item->section_item_value = $request->editor1;
        $section_item->section_item_value = $image;
        $section_item->sequence = $request->sequence;
        $section_item->save();
        return view('home');
    }
}
