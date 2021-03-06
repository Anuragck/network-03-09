<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseBatch;

class UserPagesController extends Controller
{
    public function index(){
        return view('users.index');
    }

    public function about(){
        return view('users.about');
    }

    public function course($category){

   
if( $category == 0){

    $course_list= Course::orderBy('id', 'DESC')->get();
$category_list=CourseCategory::orderBy('id', 'DESC')->get();
        return view('users.courses',compact('category_list','course_list'));

}else{


    $course_list= Course::where('course_category_id','=',$category)->get();
$category_list=CourseCategory::orderBy('id', 'DESC')->get();
        return view('users.courses',compact('category_list','course_list'));

}




    }

    public function gallery(){
        return view('users.gallery');
    }

    public function placements(){
        return view('users.placements');
    }

    public function contact(){
        return view('users.contact');
    }

    public function verifyCertificate(){
        return view('users.verifyCertificate');
    }

    public function courseMain($id)
   {

    $single_course=Course::find($id);
  

    $single_category= CourseCategory::where('id','=',$single_course->course_category_id)->first();
$batch_time= CourseBatch::where('course_id','=',$single_course->course_category_id)->get();

        return view('users.courseMainTemplate',compact('single_course','single_category','batch_time'));
    }
}
