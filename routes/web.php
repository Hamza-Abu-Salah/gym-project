<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\CridController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\MembershipController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\NatifactController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ScheduleController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\TrainerController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\site\CommentController;
use App\Http\Controllers\site\MainController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('', 'login');
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::prefix('admin/')->name('admin.')->middleware('auth','check_user')->group(function(){

        Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');
        Route::resource('trainers',TrainerController::class);
        Route::resource('users',UserController::class);
        Route::resource('features',FeatureController::class);
        Route::resource('sections',SectionController::class);
        Route::resource('services',ServiceController::class);
        Route::resource('gallerys',GalleryController::class);
        Route::resource('testimonials',TestimonialController::class);
        Route::resource('courses',CourseController::class);
        Route::resource('categories',CategoryController::class);
        Route::resource('schedules',ScheduleController::class);
        Route::resource('memberships',MembershipController::class);
        Route::resource('settings',SettingController::class);
        Route::resource('abouts',AboutController::class);
        Route::resource('crid',CridController::class);
        Route::get('email',[MessageController::class,'email'])->name('email');
        // Route::resource('profiles',ProfileController::class);
        Route::get('profiles', [\App\Http\Controllers\admin\ProfileController::class, 'index'])->name('profiles.index');
        Route::get('profiles/edit', [\App\Http\Controllers\admin\ProfileController::class, 'edit'])->name('profiles.edit');
        Route::post('profiles/update', [\App\Http\Controllers\admin\ProfileController::class, 'update'])->name('profiles.update');
        Route::get('Natifact',[\App\Http\Controllers\admin\NatifactController::class,'Natifact'])->name('Natifact');
        Route::get('password', [App\Http\Controllers\admin\PasswordController::class, 'index'])->name('changepassword.index');
        Route::post('password/update', [App\Http\Controllers\admin\PasswordController::class, 'update'])->name('changepassword.update');



    });
    Auth::routes();

    Route::view('not-allowed', 'not_allowed');


    // Website Routes

    Route::get('/home',[MainController::class,'index'])->name('site.home');
    Route::get('/features',[MainController::class,'features'])->name('site.features');
    Route::get('/about',[MainController::class,'about'])->name('site.about');
    Route::get('/course/{id}',[MainController::class,'course'])->name('site.course');
    Route::get('/membership',[MainController::class,'membership'])->name('site.membership');
    Route::get('/trainer',[MainController::class,'trainer'])->name('site.trainer');
    Route::get('/all_courses',[MainController::class,'all_courses'])->name('all_courses');
    Route::get('/service',[MainController::class,'service'])->name('site.service');
    Route::get('/contact',[MainController::class,'contact'])->name('site.contact');
    Route::post('/contact',[MainController::class,'contact_date'])->name('site.contact_date');
    Route::get('/blog_sidebar',[MainController::class,'blog1'])->name('site.blog1');
    Route::get('/blog2',[MainController::class,'blog2'])->name('site.blog2');
    Route::get('/blog3/{id}',[MainController::class,'blog3'])->name('site.blog3');
    Route::get('/comments',[CommentController::class,'comment'])->name('site.comment');
    Route::post('/comments_date',[CommentController::class,'comment_date'])->name('site.comment_date');



});


