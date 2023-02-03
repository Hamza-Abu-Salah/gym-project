<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::paginate('10');

        return view('admin.features.index',compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::select('id','title','content')->get();

        return view('admin.features.create',compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'icon'=>'required',
        ]);

        $icon_name = rand().time().$request->file('icon')->getClientOriginalName();
        $request->file('icon')->move(public_path('uploads/features'),$icon_name);

        Feature::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'icon'=>$icon_name,
        ]);

        return redirect()->route('admin.features.index')->with('msg','Added features successfully')->with('type','success');
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
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);

        $features = Feature::select('id','title','content')->get();

        return view('admin.features.edit',compact('feature','features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $feature = Feature::findOrFail($id);

        $features = Feature::select('id','title','content')->get();

        if($request->hasFile('icon')){
            $icon_name = rand().time().$request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('uploads/features'),$icon_name);
        }


        $feature->update([
            'title'=>$request->title,
            'icon'=>$icon_name,
            'content'=>$request->content,
        ]);

        return redirect()->route('admin.features.index')->with('msg','updated features successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        File::delete(public_path('uploads/features/'.$feature->icon));

        $feature->delete();

        return redirect()->route('admin.features.index')->with('msg','deleted features successfully')->with('type','danger');


    }
}
