<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Str;
use Image;

class UserController extends Controller
{
    protected $view_folder = "user";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users');

            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = "<div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='usersDataCheck$row->id' name='multi_delete_$this->view_folder[]' value='$row->id'>
                                    <label class='form-check-label' for='usersDataCheck$row->id'></label>
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
            'email' => 'required|email',
            'password' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'family_id' => 'nullable|exists:families,id'
        ]);

        try {
            $model = new model();
            $model->name = $request->name;
            $model->email = $request->email;
            $model->family_id = $request->family_id;
            $model->password = bcrypt($request->password);
            $model->save();

            if ($request->file('photo')) {
                $file = $request->file('photo');
                $file_name = Str::slug($request->name) . "." . $request->file('photo')->getClientOriginalExtension();
                $photo = Image::make($file);
                $photo->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put('user/' . $file_name, (string) $photo->encode());
                $photo_path = 'user/' . $file_name;
                $model->update(
                    [
                        'photo' => $photo_path,
                    ]
                );
            }

            $response = ['success' => true, 'message' => 'User created successfully'];
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
            'email' => 'required|email',
            'password' => 'nullable',
            'family_id' => 'nullable|exists:families,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $model = model::findOrFail($id);
            $model->name = $request->name;
            $model->email = $request->email;
            $model->family_id = $request->family_id;
            if ($request->password) {
                $model->password = bcrypt($request->password);
            }
            $model->save();

            if ($request->file('photo')) {
                Storage::delete($model->photo ?? '');

                $file = $request->file('photo');
                $file_name = Str::slug($request->name) . "." . $request->file('photo')->getClientOriginalExtension();
                $photo = Image::make($file);
                $photo->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put('user/' . $file_name, (string) $photo->encode());
                $photo_path = 'user/' . $file_name;
                $model->update(
                    [
                        'photo' => $photo_path,
                    ]
                );
            }

            $response = ['success' => true, 'message' => 'User updated successfully'];
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

            $response = ['success' => true, 'message' => 'User deleted successfully'];
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

            $response = ['success' => true, 'message' => 'User deleted successfully'];
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
