<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Slug;
use App\Http\Controllers\Controller;
use App\Jobs\HandlingVideos;
use App\Models\category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'path_image' => 'required|mimes:jpeg,png,jpg,gif:max:2048',
            'path_video' => 'required|mimes:mp4,mov,avi,wmv',
        ]);
        $data['slug'] = Slug::uniqueSlug("slug",'courses');
        $pathName = Str::random(16) . time();
        $imagePath = $pathName . '.' . 'png';
        $videoPath = $pathName . '.' . $request->path_video->getClientOriginalExtension();
        $image = Image::read($request->path_image);
        $image->resize(120,100);
        Storage::put('images/' . $imagePath,$image->toPng());
        $request->path_video->storeAs('videos' , $videoPath , 'public');
        $data['path_image']= $imagePath;
        $data['path_video']= $videoPath;
        $courses = Course::create($data);
        HandlingVideos::dispatch($videoPath,'public',$courses);
        session()->flash('success', __('Added Successfully'));
        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load(['sections.lessons','teachers','categories'])->loadCount(['teachers','categories']);
        return view('admin.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $teachers = User::where('administration_level' ,'>' , 0)->get();
        $categories = category::all();
        return view('admin.courses.edit',compact('course','teachers','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'beforePrice' => 'numeric',
            'price' => 'sometimes|numeric',
            'language' => 'string',
            'path_image' => 'mimes:jpeg,png,jpg,gif:max:2048',
            'path_video' => 'mimes:mp4,mov,avi,wmv',
        ]);
        $data['public'] = $request->has('public') ? 1 : 0;
        $data['free'] = $request->has('free') ? 1 : 0;

        $data['slug'] = Slug::uniqueSlug($request->title, 'courses');
        $pathName = Str::random(16) . time();

        if($request->hasFile('path_image')) {
            $imagePath = $pathName . '.' . 'png';
            $image = Image::read($request->path_image);
            $image->resize(120,100);
            Storage::put('images/' . $imagePath,$image->toPng());
            Storage::delete('courses/' . $course->path_image);
            $data['path_image']= $imagePath;
        }

        if($request->hasFile('path_video')) {
            $videoPath = $pathName . '.' . $request->path_video->getClientOriginalExtension();
            $request->path_video->storeAs('videos' , $videoPath , 'public');
            $data['path_video']= $videoPath;
            $course->update($data);
            HandlingVideos::dispatch($videoPath,'public',$course);
        } else {
            $course->update($data);
        }
        session()->flash('update', __('Deleted Successfully'));
        return redirect()->route('admin.courses.show',$course->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function lessons(Course $course) {
        return view('admin.courses.lesson',compact('course'));
    }
}
