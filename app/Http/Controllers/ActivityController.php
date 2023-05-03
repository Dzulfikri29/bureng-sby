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
            ->orderBy('title')
            ->get();

        if ($request->ajax()) {
            $activities = DB::table('activity_images')
                ->select('activity_images.*')
                ->orderBy('activity_images.created_at', 'desc')
                ->when($request->activity_id, function ($query) use ($request) {
                    return $query->where('activity_id', $request->activity_id);
                })
                ->paginate(10);

            $response = [
                'success' => true,
                'html' => view('activity_data', compact('activities'))->render(),
            ];

            return response()->json($response);
        }

        $jadwal_pelatihan = Section::whereHas('page', function ($query) {
            $query->where('name', 'kegiatan');
        })
            ->with('images')
            ->where('name', 'jadwal-pelatihan')
            ->first();

        return view('activity', compact('jadwal_pelatihan', 'activities'));
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
            ->select('trainings.id', 'trainings.activity as title', 'trainings.from_date as start', 'trainings.to_date as end', 'trainings.institution')
            ->get();

        foreach ($data as $key => $d) {
            $d->start = Carbon::parse($d->start)->format('Y-m-d');
            $d->end = Carbon::parse($d->end)->addDay()->format('Y-m-d');
            $d->title = "$d->institution : $d->title";
            $color = '#000000';
            if (Carbon::parse($d->end)->endOfDay()->greaterThan(Carbon::now()->endOfDay())) {
                $color = '#1f6306';
            }
            $d->color = $color;
        }

        return response()->json($data);
    }
}
