<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $lang)
    {
        if($lang == 'en') {
            $lang = 'en';
        } else {
            $lang = 'ar';
        }
        session(['lang' => $lang]);
        return redirect()->back();
    }
}
