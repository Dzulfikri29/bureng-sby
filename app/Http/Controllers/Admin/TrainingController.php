<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training as model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Str;
use Image;

class TrainingController extends Controller
{
    protected $view_folder = "training";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('trainings');

            return DataTables::of($data)
                ->editColumn('from_date', function ($row) {
                    return Carbon::parse($row->from_date)->format('d-m-Y') . ' / ' . Carbon::parse($row->to_date)->format('d-m-Y');
                })
                ->addColumn('checkbox', function ($row) {
                    $checkbox = "<div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='trainingsDataCheck$row->id' name='multi_delete_$this->view_folder[]' value='$row->id'>
                                    <label class='form-check-label' for='trainingsDataCheck$row->id'></label>
                                </div>";

                    return $checkbox;
                })
                ->addColumn('switch', function ($row) {
                    $checked = $row->status == "approve" ? "checked" : "";
                    $switch = "<div class='form-check form-switch mb-4'>
                                <input type='checkbox' class='form-check-input is-valid' $checked onchange='toggle_switch($row->id)' id='toggle_switch_$row->id'>
                                <label class='form-check-valid'>Disetujui</label>
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
            'from_date' => 'required',
            'to_date' => 'required',
            'institution' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'activity' => 'required',
            'description' => 'required',
            'participant_total' => 'required',
        ]);

        try {
            $model = new model();
            $model->from_date = $request->from_date;
            $model->to_date = $request->to_date;
            $model->institution = $request->institution;
            $model->phone = $request->phone;
            $model->address = $request->address;
            $model->activity = $request->activity;
            $model->description = $request->description;
            $model->participant_total = $request->participant_total;
            $model->status = 'pending';
            $model->save();

            $response = ['success' => true, 'message' => 'Training created successfully'];
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
            'from_date' => 'required',
            'to_date' => 'required',
            'institution' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'activity' => 'required',
            'description' => 'required',
            'participant_total' => 'required',
        ]);

        try {
            $model = model::findOrFail($id);
            $model->from_date = $request->from_date;
            $model->to_date = $request->to_date;
            $model->institution = $request->institution;
            $model->phone = $request->phone;
            $model->address = $request->address;
            $model->activity = $request->activity;
            $model->description = $request->description;
            $model->participant_total = $request->participant_total;
            $model->save();

            $response = ['success' => true, 'message' => 'Training updated successfully'];
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
            $model->delete();

            $response = ['success' => true, 'message' => 'Training deleted successfully'];
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
                $model->delete();
            }

            $response = ['success' => true, 'message' => 'Training deleted successfully'];
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

    public function toggle(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $model = model::findOrFail($id);
            if ($model->status != "approve") {
                $find_booked_date = model::where('status', 'approve')->where('from_date', '<=', $model->from_date)->where('to_date', '>=', $model->from_date)->first();
                if ($find_booked_date) {
                    $response = ['success' => false, 'message' => 'Sudah ada pelatihan di tanggal tersebut', 'data' => $model];
                    DB::rollBack();

                    if ($request->ajax()) {
                        return response()->json($response);
                    }

                    return redirect()->back()->with($response);
                }
            }
            $model->status = $model->status == 'approve' ? 'pending' : 'approve';
            $model->save();

            $response = ['success' => true, 'message' => 'status updated successfully', 'data' => $model];
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
