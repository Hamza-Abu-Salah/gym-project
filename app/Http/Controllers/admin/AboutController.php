<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::paginate(10);
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abouts = About::select('id','title','content')->get();
        return view('admin.about.create',compact('abouts'));
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
            'icon'=>'required',
            'image'=>'nullable',
            'content'=>'required',

        ]);

        $icon_name = rand().time().$request->file('icon')->getClientOriginalName();
        $request->file('icon')->move(public_path('uploads/abouts'),$icon_name);
        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/abouts'),$img_name);
        About::create([
            'title'=>$request->title,
            'image'=>$img_name,
            'icon'=>$icon_name,
            'content'=>$request->content,
            'experience'=>$request->experience,
            'start_playing'=>$request->start_playing
        ]);

        return redirect()->route('admin.abouts.index')->with('msg', 'Traniner added successfully')->with('type', 'success');

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
        $about = About::findOrFail($id);
        $abouts = About::select('id','title')->get();
        return view('admin.about.edit',compact('about','abouts'));
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

        $about = About::findOrFail($id);
        $icon_name = $about->icon;
        $img_name = $about->image;
        if($request->hasFile('icon','image')){
            $icon_name = rand().time().$request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('uploads/abouts'),$icon_name);
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/abouts'),$img_name);
        }
        $about->update([
            'title'=>$request->title,
            'image'=>$img_name,
            'icon'=>$icon_name,
            'content'=>$request->content,
            'experience'=>$request->experience,
            'start_playing'=>$request->start_playing

        ]);

        return redirect()->route('admin.abouts.index')->with('msg','About updated successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        File::delete(public_path('uploads/abouts/'.$about->icon));
        $about->delete();
        return redirect()->route('admin.abouts.index')->with('msg','About deleted successfully')->with('type','danger');
    }
}
