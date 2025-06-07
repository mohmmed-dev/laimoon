<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, category $category)
    {
        $category->load(['courses' , 'articles']);

        return view('categories.category', ['category' => $category,'courses' => $category->courses,'articles' => $category->articles]);
    }
}
