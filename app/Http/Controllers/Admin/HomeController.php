<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Carbon\Carbon;
use Faker\Factory;
use Spatie\Analytics\Period;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $faker = Factory::create();

        if ($request->ajax()) {
            $from_date = $request->from_date ?? Carbon::now()->startOfMonth()->format('Y-m-d');
            $to_date = $request->to_date ?? Carbon::now()->startOfMonth()->format('Y-m-d');
            $period = Period::create(Carbon::parse($from_date), Carbon::parse($to_date));

            $data['visitors_page_views'] = Analytics::fetchVisitorsAndPageViews($period);

            $total_visitors_page_views = collect(Analytics::fetchTotalVisitorsAndPageViews($period));
            $labels = [];
            foreach ($total_visitors_page_views->pluck('date') as $key => $value) {
                array_push($labels, Carbon::parse($value)->format('j/n/y'));
            }

            $data['total_visitors_page_views']  = [
                'visitor_data' =>  $total_visitors_page_views->pluck('visitors')->toArray(),
                'page_view_data' =>  $total_visitors_page_views->pluck('pageViews')->toArray(),
                'labels' => $labels,
            ];

            $data['most_visited_pages'] = Analytics::fetchMostVisitedPages($period, 10);

            // get user types
            $user_types = Analytics::fetchUserTypes($period);
            $user_types_labels = [];
            $user_types_data = [];
            $user_types_Color = [];
            foreach ($user_types as $key => $user_types) {
                array_push($user_types_labels, $user_types['type']);
                array_push($user_types_data, $user_types['sessions']);
                array_push($user_types_Color, $faker->hexColor());
            }

            $data['user_types_labels'] = $user_types_labels;
            $data['user_types_data'] = $user_types_data;
            $data['user_types_Color'] = $user_types_Color;

            // get top browsers
            $top_browsers = Analytics::fetchTopBrowsers($period, 10);
            $top_browser_data = [];
            foreach ($top_browsers as $key => $top_browser) {
                $push_browser['browser'] = strtolower($top_browser['browser']);
                $push_browser['sessions'] = strtolower($top_browser['sessions']);

                array_push($top_browser_data, $push_browser);
            }
            $data['top_browsers'] = $top_browser_data;

            //get top countries
            $top_countries =  Analytics::performQuery(
                $period,
                'ga:sessions',
                [
                    'dimensions' => 'ga:country',
                    'max-results' => 10,
                ]
            );

            $data['top_countries'] = collect($top_countries['rows'] ?? [])->map(fn (array $pageRow) => [$pageRow]);
            return response()->json($data);
        }

        $data['from_date'] = Carbon::now()->startOfMonth()->format('Y-m-d');
        $data['to_date'] = Carbon::now()->endOfMonth()->format('Y-m-d');
        return view('admin.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
