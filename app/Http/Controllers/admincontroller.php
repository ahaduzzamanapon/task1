<?php

namespace App\Http\Controllers;
use App\Models\settings;
use App\Models\catmodel;
use App\Models\imagemodel;

use Session;

use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function dashbord()
    {
        $cat=catmodel::all();
        $image=imagemodel::all();

        $catc=count($cat);
        $imagec=count($image);



        return view('admin/index',compact('catc', 'imagec'));
    }
    public function addimage()
    {
        $cat = catmodel::all();
        return view('admin/addimage', compact('cat'));
    }
    public function manageimage()
    {

        $showdata = imagemodel::join('catmodels', 'catmodels.id', '=', 'imagemodels.catid')
        ->select('imagemodels.*', 'catmodels.catname')
        ->orderBy('id', 'DESC')->paginate(10);


        // $showdata = imagemodel::all();
        

        $showdatacout = count($showdata);

        return view('admin/manageimage', compact('showdata', 'showdatacout'));
    }
    public function cattbl()
    {
        $showdata = catmodel::orderBy('id', 'DESC')->paginate(5);

        $showdatacout = count($showdata);

        return view('admin/cattbl', compact('showdata', 'showdatacout'));
    }
    public function addcat()
    {
        return view('admin/addcat');
    }

    public function catstor(Request $request)
    {
        $ruls = [
            'catname' => 'required',
        ];
        $this->validate($request, $ruls);

        $data = $request->catname;

        $chackd = catmodel::where('catname', 'LIKE', '%'.$data.'%')->get();
        $cchackd = count($chackd);

        if ($cchackd == 0) {
            $catmodel = new catmodel();
            $catmodel->catname = $request->catname;
            $catmodel->save();
            Session::flash('msg', 'Data Added successful');

            return redirect('admin/cattbl');
        }
        Session::flash('msg', 'Data Already have');

        return redirect('admin/addcat');
    }
    public function imagestor(Request $request)
    {
        $ruls = [
            'catid' => 'required',
            'image' => 'required',
        ];
        $this->validate($request, $ruls);

       
            $imagemodel = new imagemodel();
            $imagemodel->catid = $request->catid;

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
            $imagemodel->image = $imageName;


            $imagemodel->save();
            Session::flash('msg', 'Data Added successful');

            return redirect('admin/manageimage');
       
    }

    public function editcat($id = null)
    {
        $data = catmodel::find($id);

        return view('/admin/editcatdata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $ruls = [
            'catname' => 'required',
        ];
        $this->validate($request, $ruls);

        $catmodel = catmodel::find($id);
        $catmodel->catname = $request->catname;
        $catmodel->save();
        Session::flash('msg', 'Data Added Updated');

        return redirect('admin/cattbl');
    }

    public function delletdata($id)
    {
        $catmodel = catmodel::find($id);

        $catmodel->delete();
        Session::flash('msg', 'Data succesfully Delleted');

        return redirect('admin/cattbl');
    }
    public function delletimage($id)
    {
        $catmodel = imagemodel::find($id);

        $catmodel->delete();
        Session::flash('msg', 'Data succesfully Delleted');

        return redirect('admin/manageimage');
    }

    public function settings()
    {
        $data = settings::find(1);

        return view('admin/settings', compact('data'));
    }

    public function updatesettings(Request $request)
    {
        $settings = settings::find(1);
        $settings->sitename = $request->sitename;
        $settings->titelname = $request->titelname;
        $settings->save();
        Session::flash('msg', 'Data Updated');

        return redirect('admin/settings');
    }
}
