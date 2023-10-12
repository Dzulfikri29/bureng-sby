<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\News;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Spatie\Sitemap\SitemapIndex;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function createSiteMap()
    {
        $sitemap = SitemapIndex::create()
            ->add(url('/'))
            ->add(url('/sejarah'))
            ->add(url('/pohon-keluarga'))
            ->add(url('/galeri'))
            ->add(url('/berita'))
            ->add(url('/kegiatan'))
            ->add(url('/silsilah'));

        $news = News::where('type', 'news')->get();
        foreach ($news as $item) {
            $sitemap->add(url('/berita/' . $item->slug));
        }

        $activity = News::where('type', 'activity')->get();
        foreach ($activity as $item) {
            $sitemap->add(url('/kegiatan/' . $item->slug));
        }

        $families = Family::all();
        foreach ($families as $item) {
            $sitemap->add(url('/silsilah/' . $item->slug));
        }


        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
