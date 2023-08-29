<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    // Home Page
    public function index() {
        return view('pages.index');
    }

    // About Us Page
    public function about() {
        return view('pages.about-us');
    }

    // Contact Us Page
    public function contact() {
        return view('pages.contact');
    }

    // FAQ Page
    public function faq() {
        return view('pages.faq');
    }
}
