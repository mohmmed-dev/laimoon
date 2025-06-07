<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Course;
class HomeController extends Controller
{

    public function home() {
        return view('home');
    }
    public function articles() {
        return view('articles');
    }
}
