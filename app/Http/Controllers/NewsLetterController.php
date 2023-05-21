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
    public function create()
    {
        $newsLetters = NewsLetter::all()->sortByDesc('date');
        return view('nieuwsbrief.create', ['newsLetters' => $newsLetters]);
    }

    public function edit($id)
    {
        $newsletter = NewsLetter::findOrFail($id);
        return view('nieuwsbrief.edit', ['newsletter' => $newsletter]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf',
            'date' => 'required|date',
        ]);

        $newsletter = new Newsletter([
            'date' => $request->get('date')
        ]);

        if ($request->hasFile('file')) {
            $destination_path = 'storage/files/nieuws';
            $pdf = $request->file('file');
            $filename = time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path($destination_path), $filename);
            $newsletter['pdf'] = $filename;
        }

        try {
            $newsletter->save();
            return redirect()->route('nieuws.index')->with('success', 'Nieuwsbrief opgeslagen');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('nieuws.index')->with('error', 'Nieuwsbrief niet kunnen opslaan');
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'file' => 'mimes:pdf',
            'date' => 'required|date',
        ]);

        $newsletter = Newsletter::find($id);
        $newsletter->date = $request->get('date');

        if ($request->hasFile('file')) {
            $destination_path = 'storage/files/nieuws';
            $pdf = $request->file('file');
            $filename = time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path($destination_path), $filename);
            $newsletter['pdf'] = $filename;
        }

        try {
            $newsletter->save();
            return redirect()->route('nieuws.index')->with('success', 'Nieuwsbrief opgeslagen');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('nieuws.index')->with('error', 'Nieuwsbrief niet kunnen opslaan');
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

        return redirect()->route('nieuws.index')->with('success', 'Nieuwsbrief verwijderd.');
    }
}
