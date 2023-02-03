<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(10);

        return view('admin.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testimonials = Testimonial::select('id','name','position','content')->get();

        return view('admin.testimonials.create',compact('testimonials'));
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
            'name'=>'required',
            'title'=>'required',
            'position'=>'required',
            'content'=>'required',
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/testimonials'),$img_name);

        Testimonial::create([
            'name'=>$request->name,
            'title'=>$request->title,
            'position'=>$request->position,
            'content'=>$request->content,
            'image'=>$img_name,
        ]);

        return redirect()->route('admin.testimonials.index')->with('msg','Testimonials added successfully')->with('type','success');
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
        $testimonial = Testimonial::findOrFail($id);

        $testimonials = Testimonial::select('id','name','position','content')->get();

        return view('admin.testimonials.edit',compact('testimonial','testimonials'));
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
            'name'=>'required',
            'title'=>'required',
            'position'=>'required',
            'content'=>'required',
        ]);
        $testimonial = Testimonial::findOrFail($id);

        $testimonials = Testimonial::select('id','name','position','content')->get();

        $img_name = $testimonial->image;

        if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/features'),$img_name);
        }


        $testimonial->update([
            'name'=>$request->name,
            'title'=>$request->title,
            'position'=>$request->position,
            'content'=>$request->content,
        ]);

        return redirect()->route('admin.testimonials.index')->with('msg','updated testimonials successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        File::delete(public_path('uploads/services/'.$testimonial->icon));
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('msg','deleted testimonials successfully')->with('type','danger');
    }
}
