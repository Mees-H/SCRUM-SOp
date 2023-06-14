<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImageRequest;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class BannerController extends Controller
{
    public function index()
    {
        return view('banners.index', ['pages' => Page::all()]);
    }

    public function edit(string $id)
    {
        return view('banners.editBanner', ['page' => Page::findOrFail($id)]);
    }

    public function update(UploadImageRequest $request, string $pageId)
    {
        $banner = $request->file('image');
        $imageNameWithExt = $banner->getClientOriginalName();
        $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
        $imageExt = $banner->getClientOriginalExtension();
        $storeImage = $imageName . time() . "." . $imageExt;

        $banner->move(public_path('img/banners'), $storeImage);

        $dbbanner = Page::where('id', $pageId)->update(['banner_image' => $storeImage]);

        return redirect('/banners')->with('success', 'Banner is aangepast');
    }

}
