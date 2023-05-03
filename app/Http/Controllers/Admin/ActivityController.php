<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity as model;
use App\Models\Activity;
use DOMDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;
use Yajra\DataTables\Facades\DataTables;
use Str;

class ActivityController extends Controller
{
    protected $view_folder = "activity";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('activities')
                ->select('activities.*');

            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = "<div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='activitiesDataCheck$row->id' name='multi_delete_$this->view_folder[]' value='$row->id'>
                                    <label class='form-check-label' for='activitiesDataCheck$row->id'></label>
                                </div>";

                    return $checkbox;
                })
                ->addColumn('action', function ($row) {
                    $action['data'] = $row;
                    $action['edit'] = route("admin.$this->view_folder.edit", [$this->view_folder => $row->id]);
                    $action['delete'] = route("admin.$this->view_folder.destroy", [$this->view_folder => $row->id]);
                    $action['main'] = $this->view_folder;

                    return view('admin.component.action_button', $action);
                })
                ->escapeColumns([])
                ->addIndexColumn()
                ->make(true);
        }

        return view("admin.$this->view_folder.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.$this->view_folder.create");
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
            'title' => 'required',
        ]);

        $slug = Str::slug(Str::lower($request->title));
        $find_same_slug = Activity::where('slug', $slug)->first();

        if ($find_same_slug) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Nama activity telah digunakan']);
        }

        try {
            $model = new model();
            $model->slug = $slug;
            $model->title = $request->title;
            $model->user_id = auth()->user()->id;
            $model->save();

            $response = ['success' => true, 'message' => 'activity created successfully'];
            DB::commit();

            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->route("admin.$this->view_folder.edit", [$this->view_folder => $model->id])->with($response);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw ($th);
            $response = ['success' => false, 'message' => $th->getMessage()];
            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->back()->with($response);
        }
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

        $model = model::findOrFail($id);
        return view("admin.$this->view_folder.edit", ['model' => $model]);
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
        DB::beginTransaction();

        $request->validate([
            'title' => 'required',
        ]);

        $slug = Str::slug(Str::lower($request->title));
        $find_same_slug = Activity::where('slug', $slug)
            ->where('id', '!=', $id)
            ->first();

        if ($find_same_slug) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Nama activity telah digunakan']);
        }

        try {
            $model = model::find($id);
            $model->slug = $slug;
            $model->title = $request->title;
            $model->save();

            $response = ['success' => true, 'message' => 'activity updated successfully'];
            DB::commit();

            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->route("admin.$this->view_folder.edit", [$this->view_folder => $model->id])->with($response);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw ($th);
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
    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $model = model::findOrFail($id);
            $images = $model->images();
            foreach ($images as $img) {
                Storage::delete($img->path);
                $img->delete();
            }
            $model->delete();

            $response = ['success' => true, 'message' => 'activity deleted successfully'];
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

    public function multiple_destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $models = model::whereIn('id', $request->ids)->get();
            foreach ($models as $model) {
                $images = $model->images();
                foreach ($images as $img) {
                    Storage::delete($img->path);
                    $img->delete();
                }
                $model->delete();
            }

            $response = ['success' => true, 'message' => 'activity deleted successfully'];
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
        try {
            $paths = $request->paths ?? [];
            $fix_path = [];
            if (count($paths) > 0) {
                foreach ($paths as $key => $path) {
                    $fix_path[] = str_replace(asset('storage/'), '', $path);
                }
                Storage::delete($fix_path);
                $response = [
                    'success' => true,
                    'message' => 'Image uploaded successfully',
                ];

                if ($request->ajax()) {
                    return response()->json($response);
                }
            }
        } catch (\Throwable $th) {
            $response = ['success' => false, 'message' => $th->getMessage()];
            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->back()->with($response);
        }
    }
}
