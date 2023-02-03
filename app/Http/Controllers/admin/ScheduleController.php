<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Corse;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::with('course')->paginate(10);

        return view('admin.schedules.index',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedules = Schedule::select('id','day')->get();
        $schedule = new Schedule();
        $courses = Corse::select('id','name')->get();
        return view('admin.schedules.create',compact('schedules','courses','schedule'));

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
            'day'=>'required',
            'start_hour'=>'required',
            'end_hour'=>'required',
            'icon'=>'required',
            'course_id'=>'required',
        ]);

        $icon_name = rand().time().$request->file('icon')->getClientOriginalName();
        $request->file('icon')->move(public_path('uploads/schedules'),$icon_name);

        Schedule::create([
            'day'=>$request->day,
            'start_hour'=>$request->start_hour,
            'end_hour'=>$request->end_hour,
            'icon'=>$icon_name,
            'course_id'=>$request->course_id,
        ]);

        return redirect()->route('admin.schedules.index')->with('msg','Added schedules successfully')->with('type','success');

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
        $schedule = Schedule::findOrFail($id);
        $schedules = Schedule::select('id','day')->get();
        $courses = Corse::select('id','name')->get();
        return view('admin.schedules.edit',compact('schedules','courses','schedule'));
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
            'day'=>'required',
            'start_hour'=>'required',
            'end_hour'=>'required',
            'course_id'=>'required',
        ]);

        $schedule = Schedule::findOrFail($id);

        $schedules = Schedule::select('id','day')->get();
        $categories = Corse::select('id','name')->get();

        $img_name = $schedule->image;
        if($request->hasFile('icon')){
            $icon_name = rand().time().$request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('uploads/schedules'),$icon_name);
        }


        $schedule->update([
            'day'=>$request->day,
            'start_hour'=>$request->start_hour,
            'end_hour'=>$request->end_hour,
            'course_id'=>$request->course_id
        ]);

        return redirect()->route('admin.schedules.index')->with('msg','updated schedules successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        File::delete(public_path('uploads/features/'.$schedule->image));

        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('msg','deleted schedules successfully')->with('type','danger');
    }
}
