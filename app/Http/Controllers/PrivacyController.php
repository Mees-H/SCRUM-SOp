<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
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
        try{
            $request->validate([
                'file' => 'required|mimes:pdf'
            ]);

            $uploadFile = $request->file('file');
            $fileNameWithExt = $uploadFile->getClientOriginalName();
            $fileName =pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt=$uploadFile->getClientOriginalExtension();
            $storeFile= 'avg.pdf';

            if(File::exists('./public/files/avg.pdf')){
                File::delete('./public/files/avg.pdf');
            }

            $request->file->move('files', $storeFile);
            $carousel= slider::create([
                'image' => $storeFile
            ]);
            return redirect('privacy/edit')->with('success', 'Privacyverklaring is succesvol geupload');
        }
        catch (\Exception $e){
            return Redirect::back()->withErrors("Geen geldige pdf extensie");
        }
    }

}
