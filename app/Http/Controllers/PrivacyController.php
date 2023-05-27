<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrivacyController extends Controller
{
    public function index()
    {
        return view('privacy.index');
    }

    public function download()
    {
        return Storage::disk('public')->download('avg.pdf');
    }

    public function edit()
    {
        return view('privacy.edit');
    }

    public function store(Request $request)
    {

    }

}
