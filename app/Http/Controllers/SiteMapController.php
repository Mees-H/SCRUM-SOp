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
        if(Storage::disk('public')->exists('sitemap.json')){
            $json = json_decode(Storage::disk('public')->get('sitemap.json'),true);
        }else{
            $json = [
                'categories' => []
            ];
        }



        //get all years of albums and add them to a new category called Foto's
        $years = (new GalleryController())->ShowAllYearsOfGallerys();
        $json['categories'][] = array(
            'private' => false,
            'name' => 'Galerij',
            'links' => []
        );
        $json['categories'] = array_map(function($category) use ($years) {
            if($category['name'] === "Galerij"){
                foreach ($years as $year){
                    $category['links'][] = [
                        'name' => $year,
                        'link' => route('galerij_jaar', $year)
                    ];
                }
            }
            return $category;
        }, $json['categories']);

        //TODO: later we need to automatically add news items aswell


        //filter private results if not authenticated
        if (!auth()->check()) {
            $json['categories'] = array_filter($json['categories'], function ($category) {
                return $category['private'] !== true;
            });
        }

        return view('links', ['links' => $json['categories']]);
    }
}
