<?php

namespace App\Http\Controllers\Admin;

use AkkiIo\LaravelGoogleAnalytics\Facades\LaravelGoogleAnalytics;
use AkkiIo\LaravelGoogleAnalytics\Period;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Support\Carbon as SupportCarbon;

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

        $from_date = $request->from_date ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $to_date = $request->to_date ?? Carbon::now()->startOfMonth()->format('Y-m-d');

        if ($request->ajax()) {
            $period = Period::create(SupportCarbon::parse($from_date), SupportCarbon::parse($to_date));

            $total_users_by_date = collect(LaravelGoogleAnalytics::getMostUsersByDate($period))->sortBy('date');
            $total_views_by_date = collect(LaravelGoogleAnalytics::getTotalViewsByDate($period))->sortBy('date');

            $labels = [];
            foreach ($total_views_by_date->pluck('date') as $key => $value) {
                array_push($labels, Carbon::parse($value)->format('j/n/y'));
            }

            $data['total_visitors_page_views']  = [
                'visitor_data' =>  $total_users_by_date->pluck('totalUsers')->toArray(),
                'page_view_data' =>  $total_views_by_date->pluck('screenPageViews')->toArray(),
                'labels' => $labels,
            ];
            $data['most_visited_pages'] = LaravelGoogleAnalytics::getMostViewsByPage($period, 10);

            // get user types
            $user_types = LaravelGoogleAnalytics::getTotalNewAndReturningUsers($period);
            $user_types_labels = [];
            $user_types_data = [];
            $user_types_Color = [];
            foreach ($user_types as $key => $user_types) {
                array_push($user_types_labels, $user_types['newVsReturning']);
                array_push($user_types_data, $user_types['totalUsers']);
                array_push($user_types_Color, $faker->hexColor());
            }

            $data['user_types_labels'] = $user_types_labels;
            $data['user_types_data'] = $user_types_data;
            $data['user_types_Color'] = $user_types_Color;

            // get top browsers
            $top_browsers = LaravelGoogleAnalytics::getMostUsersByBrowser($period, 10);
            $top_browser_data = [];
            foreach ($top_browsers as $key => $top_browser) {
                $push_browser['browser'] = strtolower($top_browser['browser']);
                $push_browser['sessions'] = strtolower($top_browser['totalUsers']);

                array_push($top_browser_data, $push_browser);
            }
            $data['top_browsers'] = $top_browser_data;

            $top_countries = collect(LaravelGoogleAnalytics::getMostUsersByCountry($period, 10));

            $data_top_countries = [];
            foreach ($top_countries as $key => $item) {
                array_push(
                    $data_top_countries,
                    [
                        'country' => $item['country'],
                        'totalUsers' => $item['totalUsers'],
                        'countryId' => strtolower($item['countryId']),
                    ]
                );
            }

            $data['top_countries'] = $data_top_countries;
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
