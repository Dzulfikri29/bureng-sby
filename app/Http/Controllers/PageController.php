<?php

namespace App\Http\Controllers;

use AkkiIo\LaravelGoogleAnalytics\Facades\LaravelGoogleAnalytics;
use AkkiIo\LaravelGoogleAnalytics\Period;
use App\Models\Blog;
use App\Models\Section;
use App\Models\Structure;
use Illuminate\Http\Request;
use Analytics;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class PageController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $period = Period::create(SupportCarbon::parse('2020-01-01'), SupportCarbon::now());

            $total_users = LaravelGoogleAnalytics::getTotalUsers($period);
            $total_durations = LaravelGoogleAnalytics::getAverageSessionDuration($period);
            $total_pageviews = LaravelGoogleAnalytics::getTotalViews($period);

            $data['total_users'] = $total_users + 76;
            $data['total_durations'] = number_format(($total_durations / 60) + 3.36, 2) . " menit";
            $data['total_pageviews'] = $total_pageviews + 309;

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
