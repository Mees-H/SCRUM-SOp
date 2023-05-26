<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\NewsArticle;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class NewsArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return match ($_GET['sort'] ?? null) {
            'date_desc' => $this->filterDateDesc(),
            'date_asc' => $this->filterDateAsc(),
            'title_desc' => $this->filterTitleDesc(),
            'title_asc' => $this->filterTitleAsc(),
            default => view('nieuws.nieuwsbrief', ['years' => $this->getYears()->toArray()], ['articles' => NewsArticle::all()]),
        };
    }

    public function getYears(){
        return NewsArticle::all()->sortByDesc('date')->groupBy(function($date) {
            return Carbon::parse($date->date)->format('Y'); // grouping by years
        });
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
            'date' => 'required',
            'body' => 'required|max:999',
            'img' => 'nullable|array',
            'img.*' => 'image',
            'file' => 'nullable|array',
            'file.*' => 'file'
        ]);

        $article = NewsArticle::create([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'date' => $request->get('date')
        ]);

        //Saving image
        if($request->hasFile('img')){
            $destination_path = 'storage/img/nieuws';
            $imgArr = [];
            foreach($request->img as $img){
                $image_name = $img->getClientOriginalName();
                $img->move(public_path($destination_path), $image_name);
                $imgArr[] = $image_name;
            }
            $article['imgurl'] = $imgArr;
        }

        //Saving files
        if($request->hasFile('file')){
            $destination_path = 'storage/files/nieuws';
            $fileArr = [];
            foreach($request->file as $file){
                $file_name = $file->getClientOriginalName();
                $file->move(public_path($destination_path), $file_name);
                $fileArr[] = $file_name;
            }
            $article['fileurl'] = $fileArr;
        }
        try{
            $article->save();
            return redirect('/nieuws')->with('success', 'Artikel opgeslagen');
        } catch(ModelNotFoundException $e){
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
        try{
            $article = NewsArticle::findOrFail($id);
        } catch(ModelNotFoundException $e){
            return redirect('/nieuws')->with('error', 'Kon artikel niet ophalen');
        }
        return view('nieuws.edit',
            ['articles' => NewsArticle::all()->sortByDesc('date'),
            'editArticle' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'date' => 'required',
            'body' => 'required|max:999',
            'img' => 'nullable|array',
            'img.*' => 'image',
            'file' => 'nullable|array',
            'file.*' => 'file'
        ]);

        $article = NewsArticle::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->date = $request->get('date');

        //Saving image
        $imgArr = [];
        if($request->hasFile('img')){
            $destination_path = 'storage\img\nieuws';
            foreach($request->img as $img){
                $image_name = $img->getClientOriginalName();
                $img->move(public_path($destination_path), $image_name);
                $imgArr[] = $image_name;
            }
        }
        foreach($article['imgurl'] as $existingImage){
            //Deleting images
            if($request->deleteImages != null){
                if(!in_array($existingImage, $request->deleteImages)){
                    $imgArr[] = $existingImage;
                }
            }
            else{
                $imgArr[] = $existingImage;
            }
        }
        $article['imgurl'] = $imgArr;

        //Saving files
        if($request->hasFile('file')){
            $destination_path = 'storage/files/nieuws';
            $fileArr = [];
            foreach($request->file as $file){
                $file_name = $file->getClientOriginalName();
                $file->move(public_path($destination_path), $file_name);
                $fileArr[] = $file_name;
            }
            $article['fileurl'] = $fileArr;
        }

        try{
            $article->save();
            return redirect('/nieuws')->with('success', 'Artikel opgeslagen');
        } catch(ModelNotFoundException $e){
            return redirect('/nieuws')->with('error', 'Artikel niet kunnen opslaan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try{
            $article = NewsArticle::findOrFail($id);
        } catch(ModelNotFoundException $e){
            return redirect('/nieuws')->with('error', 'Kon artikel niet ophalen');
        }

        if($article->imgurl != null){
            foreach($article->imgurl as $img){
                $path = 'storage/img/nieuws/'.$img;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
        }

        if($article->fileurl != null){
            foreach($article->fileurl as $file){
                $path = 'storage/files/nieuws/'.$file;

                if(File::exists($path)){
                    File::delete($file);
                }
            }
        }

        $article->delete();

        return redirect('/nieuws')->with('success', 'Artikel verwijderd.');
    }

    //filter on date descending
    public function filterDateDesc(){
        return view('nieuws.nieuwsbrief', ['years' => $this->getYears()->toArray()], ['articles' => NewsArticle::all()->sortByDesc('date')]);
    }
    //filter on date ascending
    public function filterDateAsc(){
        return view('nieuws.nieuwsbrief', ['years' => $this->getYears()->toArray()], ['articles' => NewsArticle::all()->sortBy('date')]);
    }
    //filter on title desc
    public function filterTitleDesc(){
        return view('nieuws.nieuwsbrief', ['years' => $this->getYears()->toArray()], ['articles' => NewsArticle::all()->sortByDesc('title')] );

    }
    //filter on title ascending
    public function filterTitleAsc()
    {
        return view('nieuws.nieuwsbrief', ['years' => $this->getYears()->toArray()], ['articles' => NewsArticle::all()->sortBy('title')] );
    }


}
