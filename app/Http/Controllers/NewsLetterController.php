<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
            'date' => 'required|date',
        ]);

        $newsletter = Newsletter::find($id);
        $newsletter->date = $request->get('date');

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
    public function destroy(string $id): RedirectResponse
    {
        try{
            $newsletter = Newsletter::findOrFail($id);
        } catch(ModelNotFoundException $e){
            return redirect('/nieuwsbrief')->with('error', 'Kon nieuwsbrief niet ophalen');
        }

        if($newsletter->pdf != null){
            $path = 'storage/files/nieuws/'.$newsletter->pdf;
            if(File::exists($path)){
                File::delete($path);
            }
        }

        $newsletter->delete();

        return redirect('/nieuwsbrief')->with('success', 'Nieuwsbrief verwijderd.');
    }
}
