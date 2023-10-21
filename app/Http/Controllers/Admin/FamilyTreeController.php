<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FamilyTree as model;
use App\Models\FamilyTree;
use DOMDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;
use Yajra\DataTables\Facades\DataTables;
use Str;

class FamilyTreeController extends Controller
{
    protected $view_folder = "family-tree";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('family_trees')
                ->leftJoin('family_trees as parent', 'family_trees.family_tree_id', '=', 'parent.id')
                ->select('family_trees.*', 'parent.name as parent_name')
                ->when($request->family_id, function ($query, $family_id) {
                    return $query->where('family_trees.family_id', $family_id);
                });

            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = "<div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='historyDataCheck$row->id' name='multi_delete_$this->view_folder[]' value='$row->id'>
                                    <label class='form-check-label' for='historyDataCheck$row->id'></label>
                                </div>";

                    return $checkbox;
                })
                ->addColumn('action', function ($row) {
                    $action['data'] = $row;
                    $action['edit'] = route("admin.$this->view_folder.edit", ['family_tree' => $row->id]);
                    $action['delete'] = route("admin.$this->view_folder.destroy", ['family_tree' => $row->id]);
                    $action['main'] = $this->view_folder;
                    $action['edit_ajax'] = true;

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
            'family_id' => 'required|exists:families,id',
            'family_tree_id' => 'nullable|exists:family_trees,id',
            'name' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $model = new model();
            $model->family_id = $request->family_id;
            $model->family_tree_id = $request->family_tree_id;
            $model->name = $request->name;
            $model->birth_date = $request->birth_date;
            $model->death_date = $request->death_date;
            $model->place_of_death = $request->place_of_death;
            $model->phone = $request->phone;
            $model->number = $request->number;
            $model->address = $request->address;
            $model->map_link = $request->map_link;
            $model->save();

            if ($request->file('photo')) {
                $photo = Image::make($request->file('photo'));
                $photo->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $file_name = Str::slug($request->file('photo')->getClientOriginalName()) . "-" . time() . Str::random(8) . "." . $request->file('photo')->getClientOriginalExtension();
                Storage::put('family-tree/' . $file_name, (string) $photo->encode());
                $model->photo = 'family-tree/' . $file_name;
                $model->save();
            }

            $response = ['success' => true, 'message' => 'Family tree created successfully'];
            DB::commit();

            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->route("admin.$this->view_folder.edit", [$this->view_folder => $model->id])->with($response);
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
    public function edit($id, Request $request)
    {

        $model = model::leftJoin('family_trees as parent', 'family_trees.family_tree_id', '=', 'parent.id')
            ->select('family_trees.*', 'parent.name as parent_name')
            ->findOrFail($id);

        if ($request->ajax()) {
            return response()->json($model);
        }
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
            'family_id' => 'required|exists:families,id',
            'family_tree_id' => 'nullable|exists:family_trees,id',
            'name' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $model = model::find($id);
            $model->family_id = $request->family_id;
            $model->family_tree_id = $request->family_tree_id;
            $model->name = $request->name;
            $model->birth_date = $request->birth_date;
            $model->death_date = $request->death_date;
            $model->place_of_death = $request->place_of_death;
            $model->phone = $request->phone;
            $model->number = $request->number;
            $model->address = $request->address;
            $model->map_link = $request->map_link;
            $model->save();

            if ($request->file('photo')) {
                Storage::delete($model->photo ?? '');
                $photo = Image::make($request->file('photo'));
                $photo->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $file_name = Str::slug($request->file('photo')->getClientOriginalName()) . "-" . time() . Str::random(8) . "." . $request->file('photo')->getClientOriginalExtension();
                Storage::put('family-tree/' . $file_name, (string) $photo->encode());
                $model->photo = 'family-tree/' . $file_name;
                $model->save();
            }

            $response = ['success' => true, 'message' => 'Family tree updated successfully'];
            DB::commit();


            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->route("admin.$this->view_folder.edit", [$this->view_folder => $model->id])->with($response);
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
            Storage::delete($model->photo ?? '');
            $model->delete();

            $response = ['success' => true, 'message' => 'Family tree deleted successfully'];
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
                Storage::delete($model->image);

                $doc = new DOMDocument();
                $doc->loadHTML($model->body);
                $xml = simplexml_import_dom($doc);
                $images = $xml->xpath('//img');
                foreach ($images as $img) {
                    $src = $img->attributes()->src;
                    $src = str_replace(asset('storage/'), '', $src);
                    Storage::delete($src);
                }
                $model->delete();
            }

            $response = ['success' => true, 'message' => 'Family tree deleted successfully'];
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

    public function upload_image(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            if ($request->file('image')) {
                $file = $request->file('image');
                $file_name = Str::slug($request->file('image')->getClientOriginalName()) . "-" . time() . Str::random(8) . "." . $request->file('image')->getClientOriginalExtension();
                $image = Image::make($file);
                $image->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put('family-tree/' . $file_name, (string) $image->encode());
                $image_path = 'family-tree/' . $file_name;
            }

            $response = [
                'success' => true,
                'message' => 'Image uploaded successfully',
                'url' => asset('storage/' . $image_path),
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

    public function delete_image(Request $request)
    {
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

    public function select(Request $request)
    {
        try {
            $models = model::when($request->family_id, function ($query, $family_id) {
                return $query->where('family_id', $family_id);
            })
                ->when($request->search, function ($query) use ($request) {
                    $query->where('name', 'like', "%$request->search%");
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
