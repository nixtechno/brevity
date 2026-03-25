<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\CmsService;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function __construct(protected CmsService $cms)
    {
    }

    public function home(): View
    {
        return view('site.index', $this->cms->siteData('home'));
    }

    public function about(): View
    {
        return view('site.about-us', $this->cms->siteData('about'));
    }

    public function services(): View
    {
        return view('site.services', $this->cms->siteData('services'));
    }

    public function clientele(): View
    {
        return view('site.clientele', $this->cms->siteData('clientele'));
    }

    public function gallery(): View
    {
        return view('site.gallery', $this->cms->siteData('gallery'));
    }

    public function contact(): View
    {
        return view('site.contact', $this->cms->siteData('contact'));
    }
}
