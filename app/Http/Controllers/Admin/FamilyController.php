<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Family as model;
use DOMDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;
use Yajra\DataTables\Facades\DataTables;
use Str;

class FamilyController extends Controller
{
    protected $view_folder = "family";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('families')
                ->when(auth()->user()->family_id, function ($query) {
                    $query->where('id', auth()->user()->family_id);
                })
                ->select('families.*');

            return DataTables::of($data)
                ->editColumn('profile', function ($row) {
                    return Str::limit(strip_tags($row->profile), 50, '...');
                })
                ->addColumn('checkbox', function ($row) {
                    $checkbox = "<div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='historyDataCheck$row->id' name='multi_delete_$this->view_folder[]' value='$row->id'>
                                    <label class='form-check-label' for='historyDataCheck$row->id'></label>
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
            'name' => 'required|unique:families,name',
            'profile' => 'required',
            'gallery_id' => 'required',
        ]);

        try {
            $model = new model();
            $slug = Str::slug($request->name);
            $model->slug = $slug;
            $model->name = $request->name;
            $model->profile = $request->profile;
            $model->gallery_id = $request->gallery_id;
            $model->save();

            $response = ['success' => true, 'message' => 'Family created successfully'];
            DB::commit();

            $this->createSiteMap();
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
    public function edit($id)
    {
        $model = model::findOrFail($id);
        $this->authorize('view', [model::class, $model->id]);

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
            'name' => 'required|unique:families,name,' . $id,
            'profile' => 'required',
            'gallery_id' => 'required',

        ]);

        $model = model::find($id);
        $this->authorize('view', [model::class, $model->id]);
        $slug = Str::slug($request->name);
        try {
            $model->slug = $slug;
            $model->name = $request->name;
            $model->profile = $request->profile;
            $model->gallery_id = $request->gallery_id;
            $model->save();

            $response = ['success' => true, 'message' => 'Family updated successfully'];
            DB::commit();

            $this->createSiteMap();

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
        $model = model::findOrFail($id);
        $this->authorize('view', [model::class, $model->id]);
        try {
            $doc = new DOMDocument();
            $doc->loadHTML($model->profile);
            $xml = simplexml_import_dom($doc);
            $images = $xml->xpath('//img');
            foreach ($images as $img) {
                $src = $img->attributes()->src;
                $src = str_replace(asset('storage/'), '', $src);
                Storage::delete($src);
            }
            $model->delete();

            $response = ['success' => true, 'message' => 'Family deleted successfully'];
            DB::commit();

            $this->createSiteMap();

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
                $doc->loadHTML($model->profile);
                $xml = simplexml_import_dom($doc);
                $images = $xml->xpath('//img');
                foreach ($images as $img) {
                    $src = $img->attributes()->src;
                    $src = str_replace(asset('storage/'), '', $src);
                    Storage::delete($src);
                }
                $model->delete();
            }

            $response = ['success' => true, 'message' => 'Family deleted successfully'];
            DB::commit();
            $this->createSiteMap();

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
                Storage::put('family/' . $file_name, (string) $image->encode());
                $image_path = 'family/' . $file_name;
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
            $models = model::when($request->search, function ($query) use ($request) {
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
