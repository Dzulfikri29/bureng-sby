<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as model;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Str;
use Image;

class ProductController extends Controller
{
    protected $view_folder = "product";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('products')
                ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                ->select('products.*', 'product_categories.name as product_category_name', 'product_images.image')
                ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
                ->groupBy('products.id');

            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = "<div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='productsDataCheck$row->id' name='multi_delete_$this->view_folder[]' value='$row->id'>
                                    <label class='form-check-label' for='productsDataCheck$row->id'></label>
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
            'product_category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'phone' => 'required',
            'description' => 'required',
        ]);

        $slug = Str::slug(Str::lower($request->name));
        $find_same_slug = Product::where('slug', $slug)->first();

        if ($find_same_slug) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Nama product telah digunakan']);
        }

        try {
            $product_category = ProductCategory::find($request->product_category_id);
            if (!$product_category) {
                $product_category = new ProductCategory();
                $product_category->name = $request->product_category_id;
                $product_category->save();
            }

            $model = new model();
            $model->product_category_id = $product_category->id;
            $model->slug = $slug;
            $model->name = $request->name;
            $model->price = parse_price($request->price);
            $model->phone = $request->phone;
            $model->short_desc = $request->short_desc;
            $model->status = 'inactive';
            $model->save();

            $response = ['success' => true, 'message' => 'product created successfully'];
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
            'product_category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'phone' => 'required',
            'description' => 'required',
        ]);


        $slug = Str::slug(Str::lower($request->name));
        $find_same_slug = Product::where('slug', $slug)
            ->where('id', '!=', $id)
            ->first();

        if ($find_same_slug) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Nama product telah digunakan']);
        }

        try {
            $model = model::findOrFail($id);
            $product_category = ProductCategory::find($request->product_category_id);
            if (!$product_category) {
                $product_category = new ProductCategory();
                $product_category->name = $request->product_category_id;
                $product_category->save();
            }

            $model = model::find($id);
            $model->product_category_id = $product_category->id;
            $model->slug = $slug;
            $model->name = $request->name;
            $model->price = parse_price($request->price);
            $model->phone = $request->phone;
            $model->short_desc = $request->short_desc;
            $model->status = $request->status;
            $model->save();

            $response = ['success' => true, 'message' => 'product updated successfully'];
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
            Storage::delete($model->images->pluck('image')->toArray());
            ProductImage::where('product_id', $model->id)->delete();
            $model->delete();

            $response = ['success' => true, 'message' => 'product deleted successfully'];
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
                Storage::delete($model->images->pluck('image')->toArray());
                ProductImage::where('product_id', $model->id)->delete();
                $model->delete();
            }

            $response = ['success' => true, 'message' => 'product deleted successfully'];
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

            $response = ['success' => true, 'message' => 'Product status updated successfully'];
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
