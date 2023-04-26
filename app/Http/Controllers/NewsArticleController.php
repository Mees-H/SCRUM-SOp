<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsArticle;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class NewsArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('nieuws.nieuwsbrief', ['articles' => NewsArticle::all()->sortByDesc('date')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nieuws.create', ['articles' => NewsArticle::all()->sortByDesc('date')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|after:today',
            'body' => 'required|max:999',
            'img' => 'nullable|array',
            'img.*' => 'image',
            'file' => 'nullable|array'
        ]);

        $article = NewsArticle::create([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'date' => $request->get('date'),
            'imgurl' => $request->img->toString(),
            'fileurl' => $request->file,
        ]);
        ddd($article);

        //Saving image
        if($request->hasFile('img')){
            $destination_path = 'public/storage/img/nieuws';
            $image = $request->file('img');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('img')->storeAs($destination_path, $image_name);

            $article['imgurl'] = $image_name;
        }

        //Saving files
        if($request->hasFile('file')){
            $destination_path = 'public/storage/files/nieuws';
            $image = $request->file('file');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('file')->storeAs($destination_path, $image_name);

            $article['fileurl'] = $image_name;
        }
        try{
            $article->save();
            return redirect('/nieuws')->with('success', 'Artikel opgeslagen');
        } catch(e){
            return redirect('/nieuws')->with('error', 'Artikel niet kunnen opslaan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        ddd($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        NewsArticle::findOrFail($id)->delete();
        return redirect('/nieuws')->with('success', 'Artikel verwijderd.');
    }
}
