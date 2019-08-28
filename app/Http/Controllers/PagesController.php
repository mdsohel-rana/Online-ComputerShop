<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Computer Mania BD';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title',$title);
    }
    public function services(){
        $data = array (
           'title' => 'Products Catagory',
            'services' => ['All Accessories','All Items']
        );
        return view('pages.services')->with($data);
    }
}