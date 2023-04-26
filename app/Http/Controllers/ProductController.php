<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = DB::table('products')
                ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                ->select('products.*', 'product_categories.name as product_category_name', 'product_images.image')
                ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
                ->where('products.status', 'active')
                ->groupBy('products.id')
                ->when($request->product_category_id, function ($query) use ($request) {
                    return $query->where('products.product_category_id', $request->product_category_id);
                })
                ->when($request->search, function ($query) use ($request) {
                    return $query->where(function ($q) use ($request) {
                        $q->where('products.name', 'like', '%' . $request->search . '%')
                            ->orWhere('products.description', 'like', '%' . $request->search . '%');
                    });
                })
                ->paginate(10);

            $response = [
                'success' => true,
                'html' => view('product_data', compact('products'))->render(),
            ];

            return response()->json($response);
        }
        $data['categories'] = ProductCategory::orderBy('name')->get();
        return view('product', $data);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product_detail', compact('product'));
    }
}
