<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use DB;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tutorials = DB::table('tutorials')
                ->join('users', 'tutorials.user_id', '=', 'users.id')
                ->select('tutorials.*', 'users.name as user_name')
                ->where('tutorials.status', 'active')
                ->orderBy('tutorials.created_at', 'desc')
                ->when($request->search, function ($query) use ($request) {
                    return $query->where(function ($q) use ($request) {
                        $q->where('tutorials.title', 'like', '%' . $request->search . '%')
                            ->orWhere('tutorials.body', 'like', '%' . $request->search . '%');
                    });
                })
                ->paginate(10);

            $response = [
                'success' => true,
                'html' => view('tutorial_data', compact('tutorials'))->render(),
            ];

            return response()->json($response);
        }


        return view('tutorial');
    }

    public function show($slug)
    {
        $tutorial = Tutorial::where('slug', $slug)->firstOrFail();
        $prev = Tutorial::where('id', '<', $tutorial->id)
            ->where('status', 'active')
            ->orderBy('id', 'desc')->first();
        $next = Tutorial::where('id', '>', $tutorial->id)
            ->where('status', 'active')
            ->orderBy('id', 'asc')->first();

        $latests = Tutorial::where('id', '!=', $tutorial->id)
            ->where('status', 'active')
            ->orderBy('id', 'desc')->take(3)->get();

        return view('tutorial_detail', compact('tutorial', 'prev', 'next', 'latests'));
    }
}
