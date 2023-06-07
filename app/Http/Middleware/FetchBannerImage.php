<?php

namespace App\Http\Middleware;

use App\Models\Page;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FetchBannerImage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = url()->current();
        $path = parse_url($url, PHP_URL_PATH);
        $segments = explode('/', trim($path, '/'));

        $firstword = $segments[0];
        $banner = Page::where('title', $firstword)->first()->banner_image;
        if ($banner == null) {
            view()->share('banner_path', 'img/banners/default.png');
        }
        else {
            view()->share('banner_path', 'img/banners/' . $banner);
        }
        return $next($request);
    }
}
