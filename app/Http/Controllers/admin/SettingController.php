<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::paginate(10);

        return view('admin.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Setting::select('id')->get();

        return view('admin.settings.create',compact('settings'));
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
            'logo'=>'required',
            'phone'=>'required',
            'footer_text'=>'required',
            'seo_text'=>'required',
            'hero_btn_text'=>'required',
        ]);

        $logo_name = rand().time().$request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('uploads/settings/logo'),$logo_name);

        $hero_img = rand().time().$request->file('hero_image')->getClientOriginalName();
        $request->file('hero_image')->move(public_path('uploads/settings'),$hero_img);

        Setting::create([
            'logo'=>$logo_name,
            'phone'=>$request->phone,
            'footer_text'=>$request->footer_text,
            'seo_text'=>$request->seo_text,
            'hero_btn_text'=>$request->hero_btn_text,
            'copyright'=>$request->copyright,
            'hero_image'=>$hero_img,
            'hero_text'=>$request->hero_text,
            'hero_btn_link'=>$request->hero_btn_link,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'instagram'=>$request->instagram,
            'tiktok'=>$request->tiktok,
            'email'=>$request->email,
            'location'=>$request->location
        ]);

        return redirect()->route('admin.settings.index')->with('msg','added settings successfully')->with('type','success');
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
        $setting = Setting::FindOrFail($id);
        $settings = Setting::select('id')->get();

        return view('admin.settings.edit',compact('setting','settings'));
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
            'phone'=>'required',
            'footer_text'=>'required',
            'seo_text'=>'required',
            'hero_btn_text'=>'required',
        ]);

        $setting = Setting::FindOrFail($id);
        $settings = Setting::select('id')->get();

        if($request->hasFile('logo')){
            $logo_name = rand().time().$request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads/settings/logo'),$logo_name);
        }

        if($request->hasFile('hero_image')){
            $hero_img = rand().time().$request->file('hero_image')->getClientOriginalName();
            $request->file('hero_image')->move(public_path('uploads/settings'),$hero_img);
        }


        $setting->update([
            'phone'=>$request->phone,
            'footer_text'=>$request->footer_text,
            'seo_text'=>$request->seo_text,
            'hero_btn_text'=>$request->hero_btn_text,
            'copyright'=>$request->copyright,
            'hero_image'=>$hero_img,
            'hero_text'=>$request->hero_text,
            'hero_btn_link'=>$request->hero_btn_link,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'instagram'=>$request->instagram,
            'tiktok'=>$request->tiktok,
            'email'=>$request->email,
            'location'=>$request->location
        ]);

        return redirect()->route('admin.settings.index')->with('msg','updated settings successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::FindOrFail($id);
        File::delete(public_path('uploads/settings/logo/'.$setting->logo));
        File::delete(public_path('uploads/settings/'.$setting->hero_img));

        $setting->delete();
        return redirect()->route('admin.settings.index')->with('msg','deleted settings successfully')->with('type','danger');

    }
}
