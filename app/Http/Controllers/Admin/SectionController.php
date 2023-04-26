<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Section as model;
use App\Models\Section;
use App\Models\SectionImage;
use Illuminate\Support\Facades\DB;
use Storage;
use Yajra\DataTables\Facades\DataTables;
use Str;

class SectionController extends Controller
{
    protected $view_folder = "section";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = Page::find($request->page_id);
        if ($request->ajax()) {
            $data = DB::table('sections')
                ->where('page_id', $request->page_id);

            return DataTables::of($data)
                ->editColumn('name', function ($row) {
                    return Str::headline($row->name);
                })
                ->addColumn('action', function ($row) {
                    $action['data'] = $row;
                    $action['edit'] = route("admin.$this->view_folder.edit", [$this->view_folder => $row->id]);
                    $action['delete'] = route("admin.$this->view_folder.destroy", [$this->view_folder => $row->id]);
                    $action['main'] = $this->view_folder;
                    $action['can_delete'] = false;

                    return view('admin.component.action_button', $action);
                })
                ->escapeColumns([])
                ->addIndexColumn()
                ->make(true);
        }

        return view("admin.$this->view_folder.index", compact('model'));
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
            'page_id' => 'required',
        ]);

        try {
            $model = new Section();
            $model->page_id = $request->page_id;
            $model->name = Str::slug($request->name);
            $model->save();

            $response = ['success' => true, 'message' => Str::headline($this->view_folder) . " created successfully"];
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
    public function edit(Request $request, $id)
    {
        $model = model::find($id);

        return view("admin.$this->view_folder.edit", compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',
        ]);

        try {
            $model = Section::find($id);
            $model->title = $request->title;
            $model->subtitle = $request->subtitle;
            $model->body = $request->body;
            $model->save();

            $response = ['success' => true, 'message' => Str::headline($this->view_folder) . " updated successfully"];
            DB::commit();

            if ($request->ajax()) {
                return response()->json($response);
            }

            return redirect()->route("admin.$this->view_folder.index", ['page_id' => $model->page_id])->with($response);
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
            $model = Section::findOrFail($id);
            Storage::delete($model->images->pluck('path')->toArray());
            SectionImage::where('section_id', $id)->delete();
            $model->delete();

            $response = ['success' => true, 'message' => Str::headline($this->view_folder) . " deleted successfully"];
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
