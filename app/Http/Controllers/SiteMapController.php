<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sitemap;
use Illuminate\Support\Facades\Storage;

class SiteMapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $json = json_decode(Storage::disk('public')->get('sitemap.json'),true);


        //get all years of albums and add them to a new category called Foto's
        $years = (new GalleryController())->ShowAllYearsOfGallerys();
        $json['categories'][] = array(
            'name' => 'Foto\'s',
            'links' => []
        );
        $json['categories'] = array_map(function($category) use ($years) {
            if($category['name'] === "Foto's"){
                foreach ($years as $year){
                    $category['links'][] = [
                        'name' => $year,
                        'link' => route('galerij_jaar', $year)
                    ];
                }
            }
            return $category;
        }, $json['categories']);

        return view('links', ['links' => $json['categories']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
    }
}
