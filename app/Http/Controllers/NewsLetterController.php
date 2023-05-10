<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
            'date' => 'required|date',
        ]);

        $newsletter = Newsletter::create([
            'date' => $request->get('date')
        ]);

        if ($request->hasFile('pdf')) {
            $destination_path = 'storage/files/nieuws';
            $pdf = $request->file('pdf');
            $filename = time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path($destination_path), $filename);
            $newsletter['pdf'] = $filename;
        }

        try {
            $newsletter->save();
            return redirect('/nieuwsbrief')->with('success', 'Nieuwsbrief opgeslagen');
        } catch (ModelNotFoundException $e) {
            return redirect('/nieuwsbrief')->with('error', 'Nieuwsbrief niet kunnen opslaan');
        }
    }
}
