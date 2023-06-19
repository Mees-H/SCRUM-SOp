<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\NewsArticle;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;


class NewsArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = 'nieuwsartikel.index';
        return match ($_GET['sort'] ?? null) {
            'date_asc' => $this->filterDateAsc($view),
            'title_desc' => $this->filterTitleDesc($view),
            'title_asc' => $this->filterTitleAsc($view),
            default => $this->filterDateDesc($view),
        };
    }

    public function getYears()
    {
        return NewsArticle::all()->sortByDesc('date')->groupBy(function ($date) {
            return Carbon::parse($date->date)->format('Y'); // grouping by years
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $view = 'nieuwsartikel.create';
        return $this->filterDateDesc($view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date',
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
        if ($request->hasFile('img')) {
            $destination_path = 'img';
            $imgArr = [];
            foreach ($request->img as $img) {
                $image_name = $img->getClientOriginalName();
                $img->move(public_path($destination_path), $image_name);
                $imgArr[] = $image_name;
            }
            $article['imgurl'] = $imgArr;
        }

        //Saving files
        if ($request->hasFile('file')) {
            $destination_path = 'storage/files/nieuws';
            $fileArr = [];
            foreach ($request->file as $file) {
                $file_name = $file->getClientOriginalName();
                $file->move(public_path($destination_path), $file_name);
                $fileArr[] = $file_name;
            }
            $article['fileurl'] = $fileArr;
        }
        try {
            $article->save();
            return redirect('/nieuwsartikel')->with('success', 'Artikel opgeslagen');
        } catch (ModelNotFoundException $e) {
            return redirect('/nieuwsartikel')->with('error', 'Artikel niet kunnen opslaan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $editArticle = NewsArticle::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect('/nieuwsartikel')->with('error', 'Kon artikel niet ophalen');
        }
        return view('nieuwsartikel.edit', compact('editArticle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date',
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

        $imgArr = [];
        if ($request->hasFile('img')) {
            $destination_path = 'img';
            foreach ($request->img as $img) {
                $image_name = $img->getClientOriginalName();
                $img->move(public_path($destination_path), $image_name);
                $imgArr[] = $image_name;
            }
            if ($article['imgurl'] != null) {
                foreach ($article['imgurl'] as $existingImage) {
                    if (!in_array($existingImage, $request->input('deleteImages', []))) {
                        $imgArr[] = $existingImage;
                    }
                }
            }
        } else {
            if ($article['imgurl'] != null) {
                foreach ($article['imgurl'] as $existingImage) {
                    if (!in_array($existingImage, $request->input('deleteImages', []))) {
                        $imgArr[] = $existingImage;
                    }
                }
            }
        }

        $article['imgurl'] = $imgArr;

        //Saving files
        if ($request->hasFile('file')) {
            $destination_path = 'storage/files/nieuws';
            $fileArr = [];
            foreach ($request->file as $file) {
                $file_name = $file->getClientOriginalName();
                $file->move(public_path($destination_path), $file_name);
                $fileArr[] = $file_name;
            }
            $article['fileurl'] = $fileArr;
        }

        try {
            $article->save();
            return redirect('/nieuwsartikel')->with('success', 'Artikel opgeslagen');
        } catch (ModelNotFoundException $e) {
            return redirect('/nieuwsartikel')->with('error', 'Artikel niet kunnen opslaan');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $article = NewsArticle::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect('/nieuwsartikel')->with('error', 'Kon artikel niet ophalen');
        }

        if ($article->imgurl != null) {
            foreach ($article->imgurl as $img) {
                $article['imgurl'] = [];
            }
        }

        if ($article->fileurl != null) {
            foreach ($article->fileurl as $file) {
                $article['fileurl'] = [];
            }
        }

        $article->delete();

        return redirect('/nieuwsartikel')->with('success', 'Artikel verwijderd.');
    }

    //filter on date descending
    public function filterDateDesc($view)
    {
        $articles = NewsArticle::all()->sortByDesc('date');
        return view($view, ['years' => $this->getYears()->toArray()], compact('articles'));
    }
    //filter on date ascending
    public function filterDateAsc($view)
    {
        $articles = NewsArticle::all()->sortBy('date');

        return view($view, ['years' => $this->getYears()->toArray()], compact('articles'));
    }
    //filter on title desc
    public function filterTitleDesc($view)
    {
        $articles = NewsArticle::all()->sortByDesc('title');
        return view($view, ['years' => $this->getYears()->toArray()], compact('articles'));

    }
    //filter on title ascending
    public function filterTitleAsc($view)
    {
        $articles = NewsArticle::all()->sortBy('title');
        return view($view, ['years' => $this->getYears()->toArray()], compact('articles'));
    }


}
