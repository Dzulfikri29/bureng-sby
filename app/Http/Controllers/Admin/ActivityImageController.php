<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityImage as model;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Str;
use Image;

class ActivityImageController extends Controller
{
    protected $view_folder = "activity-image";

    public function index(Request $request)
    {
        try {
            $model = model::where('activity_id', $request->activity_id)->get();

            $response = ['success' => true, 'data' => $model];

            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->back()->with($response);
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = ['success' => false, 'message' => $th->getMessage()];
            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->back()->with($response);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'activity_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10048',
        ]);

        try {
            $activity = Activity::findOrFail($request->activity_id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $file_name = Str::slug($activity->name) . "-" . time() . Str::random(8) . "." . $request->file('image')->getClientOriginalExtension();
                $image = Image::make($file);
                $image->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put('activity/' . $file_name, (string) $image->encode());
                $image_path = 'activity/' . $file_name;

                $activity->images()->create([
                    'path' => $image_path,
                ]);
            }

            $response = [
                'success' => true,
                'message' => 'Activity image uploaded successfully',
                'path' => $image_path,
            ];
            DB::commit();

            if ($request->ajax()) {
                return response()->json($response);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = ['success' => false, 'message' => $th->getMessage()];
            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->back()->with($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = model::where('path', $request->image)->first();
            if ($model) {
                Storage::delete($model->path);
                $model->delete();
            }

            $response = ['success' => true, 'message' => 'Activity image deleted successfully'];
            DB::commit();

            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->back()->with($response);
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = ['success' => false, 'message' => $th->getMessage()];
            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->back()->with($response);
        }
    }
}
