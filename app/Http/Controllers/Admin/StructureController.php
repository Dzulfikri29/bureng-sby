<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Structure as model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Str;
use Image;

class StructureController extends Controller
{
    protected $view_folder = "structure";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('structures');

            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = "<div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='structuresDataCheck$row->id' name='multi_delete_$this->view_folder[]' value='$row->id'>
                                    <label class='form-check-label' for='structuresDataCheck$row->id'></label>
                                </div>";

                    return $checkbox;
                })
                ->addColumn('photo', function ($row) {
                    $photo = asset('storage/' . $row->photo);
                    $checkbox = "<span class='avatar avatar-circle'>
                        <img class='avatar-img' src='$photo'>
                    </span>";
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
            'name' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $model = new model();
            $model->name = $request->name;
            $model->structure_id = $request->structure_id;
            $model->position = $request->position;
            $model->save();

            if ($request->file('photo')) {
                $file = $request->file('photo');
                $file_name = Str::slug($request->name) . '-' . time() . "." . $request->file('photo')->getClientOriginalExtension();
                $photo = Image::make($file);
                $photo->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $photo->crop(400, 400, 0, 0);
                Storage::put('structure/' . $file_name, (string) $photo->encode());
                $photo_path = 'structure/' . $file_name;
                $model->update(
                    [
                        'photo' => $photo_path,
                    ]
                );
            }

            $response = ['success' => true, 'message' => 'Structure created successfully'];
            DB::commit();

            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->route("admin.$this->view_folder.index")->with($response);
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
            'name' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $model = model::findOrFail($id);
            $model->name = $request->name;
            $model->structure_id = $request->structure_id;
            $model->position = $request->position;
            $model->save();

            if ($request->file('photo')) {
                Storage::delete($model->photo ?? '');

                $file = $request->file('photo');
                $file_name = Str::slug($request->name) . '-' . time() . "." . $request->file('photo')->getClientOriginalExtension();
                $photo = Image::make($file);
                $photo->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $photo->crop(400, 400, 0, 0);
                Storage::put('structure/' . $file_name, (string) $photo->encode());
                $photo_path = 'structure/' . $file_name;
                $model->update(
                    [
                        'photo' => $photo_path,
                    ]
                );
            }

            $response = ['success' => true, 'message' => 'Structure updated successfully'];
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
            Storage::delete($model->photo);
            $model->delete();

            $response = ['success' => true, 'message' => 'Structure deleted successfully'];
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
                Storage::delete($model->photo);
                $model->delete();
            }

            $response = ['success' => true, 'message' => 'Structure deleted successfully'];
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

    public function select(Request $request)
    {
        try {
            $models = model::when($request->search, function ($query) use ($request) {
                $query->where('position', 'like', "%$request->search%");
            })
                ->get();

            return response()->json($models);
        } catch (\Throwable $th) {
            $response = ['success' => false, 'message' => $th->getMessage()];
            if ($request->ajax()) {
                return response()->json($response);
            }
        }
    }
}
