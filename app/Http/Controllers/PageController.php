<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Section;
use App\Models\Structure;
use Illuminate\Http\Request;
use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $period = Period::create(Carbon::parse('2022-01-01'), Carbon::now());

            $total_users =  Analytics::performQuery(
                $period,
                'ga:sessionCount',
                [
                    'metrics' => 'ga:users',
                ]
            );
            $total_users = $total_users->totalsForAllResults['ga:users'];

            $total_durations =  Analytics::performQuery(
                $period,
                'ga:sessionDurationBucket',
                [
                    'metrics' => 'ga:avgSessionDuration',
                ]
            );
            $total_durations = number_format($total_durations->totalsForAllResults['ga:avgSessionDuration'] / 60, 2) . " menit";

            $total_pageviews =  Analytics::performQuery(
                $period,
                'ga:sessionCount',
                [
                    'metrics' => 'ga:pageViews',
                ]
            );
            $total_pageviews = $total_pageviews->totalsForAllResults['ga:pageViews'] . " kali";

            $data['total_users'] = $total_users;
            $data['total_durations'] = $total_durations;
            $data['total_pageviews'] = $total_pageviews;

            return response()->json($data);
        }

        $data['background_utama'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'home');
        })
            ->with('images')
            ->where('name', 'background-utama')
            ->first();

        $data['background_menu'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'home');
        })
            ->with('images')
            ->where('name', 'background-menu')
            ->first();

        $data['blogs'] = Blog::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('index', $data);
    }

    public function profile()
    {
        $data['header'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'profil');
        })
            ->with('images')
            ->where('name', 'header')
            ->first();

        $data['section_1'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'profil');
        })
            ->with('images')
            ->where('name', 'bagian-1')
            ->first();
        $data['section_2'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'profil');
        })
            ->with('images')
            ->where('name', 'bagian-2')
            ->first();

        return view('profile', $data);
    }

    public function structure()
    {
        $data['section_1'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'struktur');
        })
            ->with('images')
            ->where('name', 'bagian-1')
            ->first();

        $data['structures'] = Structure::orderBy('structure_id')
            ->get();
        return view('structure', $data);
    }

    public function activity()
    {
        return view('activity');
    }

    public function product()
    {
        return view('product');
    }

    public function blog()
    {
        return view('blog');
    }
}
