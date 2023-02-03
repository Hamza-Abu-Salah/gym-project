<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Corse;
use App\Models\Crid;
use App\Models\Email;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\Membership;
use App\Models\Message;
use App\Models\Schedule;
use App\Models\Section;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $latest_course = Corse::limit(4)->get();
        $home_settings = Setting::all();
        $last_testimonials = Testimonial::all();
        $last_Gallery = Gallery::limit(8)->get() ;
        $lasts_service = Service::limit(6)->get();
        $lasts_section = Section::limit(1)->get();
        $lasts_about= About::limit(1)->get();
        $last_feature = Feature::get();
        $slider_courses = Corse::limit(1)->get();
        return view('site.home',compact('slider_courses','home_settings','latest_course','last_testimonials','last_Gallery','lasts_service','lasts_section','lasts_about','last_feature'));
    }

    public function features()
    {
        $features = Feature::all();
        return view('site.home',compact('features'));
    }


    public function course($id)
    {
        $corse = Corse::findOrFail($id);
        $schedule= Schedule::findOrFail($id);
        return view('site.course',compact('corse','schedule'));
    }

    public function about()
    {
        $data = [
            'name'=>'bg-black'
        ];
        $service = Service::limit(6)->get();
        $about = About::find(2);
        $abouts = About::limit(1)->find(2);
        $last_Gallery = Gallery::limit(8)->get() ;
        return view('site.about',compact('data','about','last_Gallery','service'));
    }

    public function membership()
    {
        $memberships = Membership::limit(3)->get();
        return view('site.membership',compact('memberships'));
    }

    public function trainer()
    {
        $trainers = Trainer::get();
        return view('site.trainer',compact('trainers'));
    }
    public function all_courses()
    {
        $schedules = Schedule::get();

        $lasts_course = Corse::all();
        return view('site.all-courses',compact('lasts_course','schedules'));
    }

    public function service()
    {
        $services = Service::get();
        $last_testimonials = Testimonial::all();
        return view('site.service',compact('services','last_testimonials'));
    }

    public function contact()
    {
        $setting = Setting::all();
        $email = Email::get();
        return view('site.contact',compact('setting','email'));
    }

    public function contact_date(Request $request)
    {

        Message::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'email_id'=>$request->email_id,
        ]);

        return redirect()->back()->with('msg','Message sent successfully')->with('type','success');
    }


    public function blog1()
    {
        $crids = Crid::get();
        $categories = Category::all();
        return view('site.blog-sidebar',compact('crids','categories'));
    }

    public function blog2()
    {
        $crids = Crid::paginate(10);
        return view('site.blog',compact('crids'));
    }

    public function blog3($id)
    {
        $crid = Crid::findOrFail($id);

        $crids = Crid::all();
        $comments = Comment::all();

        return view('site.blog-single',compact('crid','crids','comments'));
    }

    public function comment_date(Request $request)
    {
        Comment::create([
            'comment' => $request->comment,
            'crid_id' => $request->crid_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('site.blog3');
    }

}
