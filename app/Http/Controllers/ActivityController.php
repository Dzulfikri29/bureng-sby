<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Section;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $activities = DB::table('activities')
            ->select('activities.*')
            ->where('activities.status', 'active')
            ->get();

        return view('activity', compact('activities'));
    }

    public function show($slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();
        $prev = Activity::where('status', 'active')->where('id', '<', $activity->id)->orderBy('id')->first();
        $next = Activity::where('status', 'active')->where('id', '>', $activity->id)->orderBy('id')->first();
        $others = Activity::where('status', 'active')->where('id', '!=', $activity->id)
            ->limit(4)
            ->inRandomOrder()
            ->get();

        $section_1 = Section::whereHas('page', function ($query) {
            $query->where('name', 'kegiatan');
        })
            ->with('images')
            ->where('name', 'bagian-1')
            ->first();

        return view('activity_detail', compact('activity', 'prev', 'next', 'others', 'section_1'));
    }

    public function event(Request $request)
    {
        $data = DB::table('trainings')
            ->where('status', 'approve')
            ->when($request->start, function ($query, $start) {
                return $query->whereDate('from_date', '>=', Carbon::parse($start));
            })
            ->when($request->end, function ($query, $end) {
                return $query->whereDate('to_date', '<=', Carbon::parse($end));
            })
            ->select('trainings.id', 'trainings.activity as title', 'trainings.from_date as start', 'trainings.to_date as end')
            ->get();

        foreach ($data as $key => $d) {
            $d->start = Carbon::parse($d->start)->format('Y-m-d');
            $d->end = Carbon::parse($d->end)->addDay()->format('Y-m-d');
            $color = '#000000';
            if (Carbon::parse($d->end)->endOfDay()->greaterThan(Carbon::now()->endOfDay())) {
                $color = '#1f6306';
            }
            $d->color = $color;
        }

        return response()->json($data);
    }
}
