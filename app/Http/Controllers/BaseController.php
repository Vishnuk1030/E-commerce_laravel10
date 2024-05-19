<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function home()
    {
        return view('index');
    }
    public function aboutUs()
    {
        return view('about_us');
    }

    public function ContactUs()
    {
        return view('contact_us');
    }

    public function blog()
    {
        return view('blog');
    }
}
