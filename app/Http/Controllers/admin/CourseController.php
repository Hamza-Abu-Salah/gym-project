<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Corse;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Corse::with('trainer','category')->paginate(10);

        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $courses = Corse::select('id','name','content','duration','student','price','calories','workout')->get();
        $trainers = Trainer::select('id', 'name')->get();
        $categories = Category::select('id','name')->get();
        $category = new Category();
        $course = new Corse();

        return view('admin.courses.create',compact('courses','trainers','categories','category','course'));
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
            'image'=>'required',
            'content'=>'required',
            'duration'=>'required',
            'student'=>'required',
            'price'=>'required',
            'hourse'=>'required',
            'calories'=>'required',
            'workout'=>'required',
            'trainer_id'=>'required',
            'category_id'=>'required',
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/courses'),$img_name);

        Corse::create([
            'name'=>$request->name,
            'image'=>$img_name,
            'content'=>$request->content,
            'duration'=>$request->name,
            'student'=>$request->student,
            'price'=>$request->price,
            'hourse'=>$request->hourse,
            'calories'=>$request->calories,
            'workout'=>$request->workout,
            'trainer_id'=>Auth::id(),
            'category_id'=>$request->category_id,
        ]);

        return redirect()->route('admin.courses.index')->with('msg','Added courses successfully')->with('type','success');
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
        $course = Corse::findOrFail($id);
        $categories = Category::select('id','name')->get();

        $courses = Corse::select('id','name','content','duration','student','hourse','price','calories','workout')->get();
        $trainers = Trainer::select('id', 'name')->get();


        return view('admin.courses.edit',compact('course','courses','trainers','categories'));
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
            'content'=>'required',
            'duration'=>'required',
            'student'=>'required',
            'price'=>'required',
            'hourse'=>'required',
            'calories'=>'required',
            'workout'=>'required',
            'trainer_id'=>'required',
            'category_id'=>'required',
        ]);

        $course = Corse::findOrFail($id);
        $courses = Corse::select('id','name','content','duration','student','hourse','price','calories','workout')->get();
        $img_name = $course->image;
        if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/courses'),$img_name);
        }


        $course->update([
            'name'=>$request->name,
            'content'=>$request->content,
            'duration'=>$request->duration,
            'student'=>$request->student,
            'price'=>$request->price,
            'hourse'=>$request->hourse,
            'calories'=>$request->calories,
            'workout'=>$request->workout,
            'trainer_id'=>Auth::id(),
            'category_id'=>$request->category_id,
        ]);

        return redirect()->route('admin.courses.index')->with('msg','Added courses successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Corse::findOrFail($id);
        File::delete(public_path('uploads/features/'.$course->image));

        $course->delete();

        return redirect()->route('admin.courses.index')->with('msg','deleted courses successfully')->with('type','danger');
    }
}
