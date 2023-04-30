<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutorial as model;
use App\Models\Tutorial;
use DOMDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;
use Yajra\DataTables\Facades\DataTables;
use Str;

class TutorialController extends Controller
{
    protected $view_folder = "tutorial";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tutorials')
                ->select('tutorials.*');

            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = "<div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='tutorialsDataCheck$row->id' name='multi_delete_$this->view_folder[]' value='$row->id'>
                                    <label class='form-check-label' for='tutorialsDataCheck$row->id'></label>
                                </div>";

                    return $checkbox;
                })
                ->addColumn('image', function ($row) {
                    $photo = asset('storage/' . $row->image);
                    $image = "<img class='avatar avatar-lg' src='$photo'>";

                    return $image;
                })
                ->addColumn('switch', function ($row) {
                    $checked = $row->status == "active" ? "checked" : "";
                    $switch = "<div class='form-check form-switch mb-4'>
                                <input type='checkbox' class='form-check-input is-valid' id='validSwitch' $checked onchange='toggle_switch($row->id)'>
                                <label class='form-check-valid'>Publikasikan</label>
                            </div>";

                    return $switch;
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
            'body' => 'required',
            'image' => 'required',
            'youtube_link' => 'active_url',
        ]);

        $slug = Str::slug(Str::lower($request->title));
        $find_same_slug = Tutorial::where('slug', $slug)->first();

        if ($find_same_slug) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Nama tutorial telah digunakan']);
        }

        try {
            $model = new model();
            $model->slug = $slug;
            $model->title = $request->title;
            $model->body = $request->body;
            $model->youtube_link = $request->youtube_link;
            $model->status = 'inactive';
            $model->user_id = auth()->user()->id;
            $model->save();


            if ($request->file('image')) {
                Storage::delete($model->image ?? '');
                $file = $request->file('image');
                $file_name = Str::slug('image-' . time()) . "." . $request->file('image')->getClientOriginalExtension();
                $image = Image::make($file);
                $image->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_path = 'tutorial-main-image/' . $file_name;
                Storage::put($image_path, (string) $image->encode());
                $model->update(
                    [
                        'image' => $image_path,
                    ]
                );
            }

            $response = ['success' => true, 'message' => 'tutorial created successfully'];
            DB::commit();
            $this->createSiteMap();

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
            'body' => 'required',
            'image' => 'required',
            'youtube_link' => 'active_url',
        ]);

        $slug = Str::slug(Str::lower($request->title));
        $find_same_slug = Tutorial::where('slug', $slug)
            ->where('id', '!=', $id)
            ->first();

        if ($find_same_slug) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Nama tutorial telah digunakan']);
        }

        try {
            $model = model::find($id);
            $model->slug = $slug;
            $model->title = $request->title;
            $model->body = $request->body;
            $model->youtube_link = $request->youtube_link;
            $model->save();

            if ($request->file('image')) {
                Storage::delete($model->image ?? '');
                $file = $request->file('image');
                $file_name = Str::slug('image-' . time()) . "." . $request->file('image')->getClientOriginalExtension();
                $image = Image::make($file);
                $image->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_path = 'tutorial-main-image/' . $file_name;
                Storage::put($image_path, (string) $image->encode());
                $model->update(
                    [
                        'image' => $image_path,
                    ]
                );
            }

            $response = ['success' => true, 'message' => 'tutorial updated successfully'];
            DB::commit();
            $this->createSiteMap();

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

            $response = ['success' => true, 'message' => 'tutorial deleted successfully'];
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

            $response = ['success' => true, 'message' => 'tutorial deleted successfully'];
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

    public function toggle(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $model = model::findOrFail($id);
            $model->status = $model->status == 'active' ? 'inactive' : 'active';
            $model->save();

            $response = ['success' => true, 'message' => 'Tutorial status updated successfully'];
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
                Storage::put('tutorial/' . $file_name, (string) $image->encode());
                $image_path = 'tutorial/' . $file_name;
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
}
