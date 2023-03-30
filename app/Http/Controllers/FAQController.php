<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    function index() {
        $FAQ = FAQ::all();
        return view('faq.index', compact('FAQ'));
    }

    function create() {

    }
    
    function edit() {

    }

    function delete() {

    }
}
