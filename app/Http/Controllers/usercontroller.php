<?php

namespace App\Http\Controllers;
use App\Models\settings;
use App\Models\catmodel;
use App\Models\imagemodel;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function user()
    {
        $cat = catmodel::all();
        $showdata = imagemodel::join('catmodels', 'catmodels.id', '=', 'imagemodels.catid')
        ->select('imagemodels.*', 'catmodels.catname')
        ->orderBy('id', 'DESC')->get();

        return view('welcome',compact('showdata','cat'));
    }
}
