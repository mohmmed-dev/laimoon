<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\courseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __invoke() {
        $courses = Course::count();
        $coursesSold = courseUser::where('bought' , 1)->count();
        $teachers = User::where('administration_level' , '>' ,0)->count();
        $subscriptions = DB::table('subscriptions')->whereNotNull('ends_at')->count();

        return view('admin.index',compact(['courses','coursesSold','teachers','subscriptions']));
    }
}
