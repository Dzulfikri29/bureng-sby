<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\FamilyTree;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Section;
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

        $sections = Section::whereHas('page', function ($query) {
            $query->where('name', 'beranda');
        })->get();

        return view('index', compact('banner_news', 'general', 'families', 'activites', 'galleries', 'news', 'history', 'random_gallery', 'sections'));
    }

    public function history()
    {
        $history = \App\Models\History::first();
        $sections = Section::whereHas('page', function ($query) {
            $query->where('name', 'sejarah');
        })->get();

        return view('history', compact('history', 'sections'));
    }

    public function gallery(Request $request)
    {
        $sections = Section::whereHas('page', function ($query) {
            $query->where('name', 'galeri');
        })->get();

        if ($request->ajax()) {
            $galleries = Gallery::orderBy('created_at', 'desc')
                ->paginate(12)
                ->withQueryString();

            return response()->json(view('gallery_data', compact('galleries'))->render());
        }
        return view('gallery', compact('sections'));
    }

    public function news(Request $request)
    {
        $sections = Section::whereHas('page', function ($query) {
            $query->where('name', 'berita');
        })->get();

        if ($request->ajax()) {
            $news = News::orderBy('created_at', 'desc')
                ->where('type', 'news')
                ->paginate(9)
                ->withQueryString();

            return response()->json(view('news_data', compact('news'))->render());
        }
        return view('news', compact('sections'));
    }

    function news_detail($slug)
    {
        $news = News::where('slug', $slug)
            ->firstOrFail();

        $other_news = News::where('id', '!=', $news->id)
            ->where('type', 'news')
            ->limit(4)
            ->get();

        $sections = Section::whereHas('page', function ($query) {
            $query->where('name', 'berita');
        })->get();

        return view('news_detail', compact('news', 'other_news', 'sections'));
    }

    public function activity(Request $request)
    {

        $sections = Section::whereHas('page', function ($query) {
            $query->where('name', 'kegiatan');
        })->get();

        if ($request->ajax()) {
            $news = News::orderBy('created_at', 'desc')
                ->where('type', 'activity')
                ->paginate(9)
                ->withQueryString();

            return response()->json(view('activity_data', compact('news'))->render());
        }
        return view('activity', compact('sections'));
    }

    function activity_detail($slug)
    {
        $news = News::where('slug', $slug)
            ->firstOrFail();

        $other_news = News::where('id', '!=', $news->id)
            ->where('type', 'activity')
            ->limit(4)
            ->get();

        $sections = Section::whereHas('page', function ($query) {
            $query->where('name', 'beranda');
        })->get();

        return view('activity_detail', compact('news', 'other_news', 'sections'));
    }


    public function family(Request $request)
    {
        $sections = Section::whereHas('page', function ($query) {
            $query->where('name', 'silsilah');
        })->get();

        if ($request->ajax()) {
            $families = Family::paginate(8)
                ->withQueryString();

            return response()->json(view('family_data', compact('families'))->render());
        }
        return view('family', compact('sections'));
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

        $sections = Section::whereHas('page', function ($query) {
            $query->where('name', 'silsilah');
        })->get();

        return view('family_detail', compact('family', 'other_families', 'news', 'galleries', 'sections'));
    }

    function family_tree_data($id)
    {
        $family_trees = FamilyTree::where('family_id', $id)
            ->select('id', 'family_tree_id as mid', 'name', 'birth_date', 'death_date', 'place_of_death')
            ->get();

        $family_trees = $family_trees->map(function ($item) {
            if ($item->birth_date) {
                $item->birth_date = 'Lahir ' . SupportCarbon::parse($item->birth_date)->translatedFormat('d M Y');
            }
            if ($item->death_date) {
                $item->death_date = 'Wafat ' . SupportCarbon::parse($item->death_date)->translatedFormat('d M Y');
                if ($item->place_of_death) {
                    $item->place_of_death = 'Makam di ' . $item->place_of_death;
                } else {
                    $item->place_of_death = '';
                }
            } else {
                $item->death_date = '';
                $item->place_of_death = '';
            }
            return $item;
        });

        return response()->json($family_trees);
    }
}
