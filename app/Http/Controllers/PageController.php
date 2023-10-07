<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\FamilyTree;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $all_news = News::orderBy('date', 'desc')
            ->get();

        $banner_news = $all_news
            ->take(3);

        $news = $all_news
            // ->skip(3)
            ->take(3);

        $activites = News::orderBy('date', 'desc')
            ->where('type', 'activity')
            ->limit(3)
            ->get();

        $history = \App\Models\History::first();

        $general = \App\Models\General::first();
        $families = \App\Models\Family::all();
        $galleries = \App\Models\Gallery::orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        $random_gallery = Gallery::inRandomOrder()
            ->first();

        return view('index', compact('banner_news', 'general', 'families', 'activites', 'galleries', 'news', 'history', 'random_gallery'));
    }

    public function history()
    {
        $history = \App\Models\History::first();

        return view('history', compact('history'));
    }

    public function gallery(Request $request)
    {

        if ($request->ajax()) {
            $galleries = Gallery::orderBy('created_at', 'desc')
                ->paginate(12)
                ->withQueryString();

            return response()->json(view('gallery_data', compact('galleries'))->render());
        }
        return view('gallery');
    }

    public function news(Request $request)
    {
        if ($request->ajax()) {
            $news = News::orderBy('created_at', 'desc')
                ->where('type', 'news')
                ->paginate(9)
                ->withQueryString();

            return response()->json(view('news_data', compact('news'))->render());
        }
        return view('news');
    }

    function news_detail($slug)
    {
        $news = News::where('slug', $slug)
            ->firstOrFail();

        $other_news = News::where('id', '!=', $news->id)
            ->where('type', 'news')
            ->limit(4)
            ->get();

        return view('news_detail', compact('news', 'other_news'));
    }

    public function activity(Request $request)
    {

        if ($request->ajax()) {
            $news = News::orderBy('created_at', 'desc')
                ->where('type', 'activity')
                ->paginate(9)
                ->withQueryString();

            return response()->json(view('activity_data', compact('news'))->render());
        }
        return view('activity');
    }

    function activity_detail($slug)
    {
        $news = News::where('slug', $slug)
            ->firstOrFail();

        $other_news = News::where('id', '!=', $news->id)
            ->where('type', 'activity')
            ->limit(4)
            ->get();

        return view('activity_detail', compact('news', 'other_news'));
    }


    public function family(Request $request)
    {
        if ($request->ajax()) {
            $families = Family::paginate(8)
                ->withQueryString();

            return response()->json(view('family_data', compact('families'))->render());
        }
        return view('family');
    }

    public function family_detail($id, Request $request)
    {
        $family = Family::find($id);
        $other_families = Family::where('id', '!=', $id)
            ->limit(4)
            ->get();

        $news = News::inRandomOrder()
            ->limit(3)
            ->get();

        $galleries = Gallery::inRandomOrder()
            ->limit(4)
            ->get();

        return view('family_detail', compact('family', 'other_families', 'news', 'galleries'));
    }

    function family_tree_data($id)
    {
        $family_trees = FamilyTree::where('family_id', $id)
            ->select('id', 'family_tree_id as mid', 'name')
            ->get();

        return response()->json($family_trees);
    }
}
