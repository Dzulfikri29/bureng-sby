<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Tutorial;
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
            ->add(url('/profile'))
            ->add(url('/product'))
            ->add(url('/activity'))
            ->add(url('/tutorial'))
            ->add(url('/blog'))
            ->add(url('/registration'));

        $blogs = Blog::all();
        foreach ($blogs as $blog) {
            $sitemap->add(url("/blog/{$blog->slug}"));
        }

        $products = Product::all();
        foreach ($products as $product) {
            $sitemap->add(url("/product/{$product->slug}"));
        }

        $activities = Activity::all();
        foreach ($activities as $activity) {
            $sitemap->add(url("/activity/{$activity->slug}"));
        }

        $tutorials = Tutorial::all();
        foreach ($tutorials as $tutorial) {
            $sitemap->add(url("/tutorial/{$tutorial->slug}"));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
