<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage as model;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Str;
use Image;

class ProductImageController extends Controller
{
    protected $view_folder = "product-image";

    public function index(Request $request)
    {
        try {
            $model = model::where('product_id', $request->product_id)->get();

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
            'product_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $product = Product::findOrFail($request->product_id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $file_name = Str::slug($product->slug) . "-" . time() . Str::random(8) . "." . $request->file('image')->getClientOriginalExtension();
                $image = Image::make($file);
                $image->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put('product/' . $file_name, (string) $image->encode());
                $image_path = 'product/' . $file_name;

                $product->images()->create([
                    'image' => $image_path,
                ]);
            }

            $response = [
                'success' => true,
                'message' => 'Product image uploaded successfully',
                'path' => $image_path,
            ];
            DB::commit();

            if ($request->ajax()) {
                return response()->json($response);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $model = model::where('product_id', $request->product_id)->get();
            $response = ['success' => false, 'message' => $th->getMessage(), 'model' => $model];
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
            $model = model::where('image', $request->image)->first();
            if ($model) {
                Storage::delete($model->image);
                $model->delete();
            }

            $response = ['success' => true, 'message' => 'Product image deleted successfully'];
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
