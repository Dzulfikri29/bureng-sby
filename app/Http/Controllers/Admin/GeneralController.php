<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General as model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Str;
use Image;

class GeneralController extends Controller
{
    protected $view_folder = "general";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['model'] = model::first();

        return view("admin.$this->view_folder.index", $data);
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
            'website_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tagline' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo_white' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo_short' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo_short_white' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'browser_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'name.*' => 'required',
            'user_name.*' => 'required',
            'link.*' => 'required',
        ]);

        try {
            // ! Update General Data
            $model = model::findOrFail($id);
            $model->website_name = $request->website_name;
            $model->phone = $request->phone;
            $model->email = $request->email;
            $model->meta_description = $request->meta_description;
            $model->address = $request->address;
            $model->tagline = $request->tagline;
            $model->meta_keywords = $request->meta_keywords;
            $model->save();

            if ($request->file('meta_image')) {
                Storage::delete($model->meta_image ?? '');
                $file = $request->file('meta_image');
                $file_name = Str::slug('meta_image-' . time()) . "." . $request->file('meta_image')->getClientOriginalExtension();
                $meta_image = Image::make($file);
                $meta_image->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $meta_image_path = 'general/' . $file_name;
                Storage::put($meta_image_path, (string) $meta_image->encode());
                $model->update(
                    [
                        'meta_image' => $meta_image_path,
                    ]
                );
            }
            if ($request->file('logo')) {
                Storage::delete($model->logo ?? '');
                $file = $request->file('logo');
                $file_name = Str::slug('logo-' . time()) . "." . $request->file('logo')->getClientOriginalExtension();
                $logo = Image::make($file);
                $logo_path = 'general/' . $file_name;
                Storage::put($logo_path, (string) $logo->encode());
                $model->update(
                    [
                        'logo' => $logo_path,
                    ]
                );
            }
            if ($request->file('logo_white')) {
                Storage::delete($model->logo_white ?? '');
                $file = $request->file('logo_white');
                $file_name = Str::slug('logo_white-' . time()) . "." . $request->file('logo_white')->getClientOriginalExtension();
                $logo_white = Image::make($file);
                $logo_white_path = 'general/' . $file_name;
                Storage::put($logo_white_path, (string) $logo_white->encode());
                $model->update(
                    [
                        'logo_white' => $logo_white_path,
                    ]
                );
            }
            if ($request->file('logo_short')) {
                Storage::delete($model->logo_short ?? '');
                $file = $request->file('logo_short');
                $file_name = Str::slug('logo_short-' . time()) . "." . $request->file('logo_short')->getClientOriginalExtension();
                $logo_short = Image::make($file);
                $logo_short_path = 'general/' . $file_name;
                Storage::put($logo_short_path, (string) $logo_short->encode());
                $model->update(
                    [
                        'logo_short' => $logo_short_path,
                    ]
                );
            }
            if ($request->file('logo_short_white')) {
                Storage::delete($model->logo_short_white ?? '');
                $file = $request->file('logo_short_white');
                $file_name = Str::slug('logo_short_white-' . time()) . "." . $request->file('logo_short_white')->getClientOriginalExtension();
                $logo_short_white = Image::make($file);
                $logo_short_white_path = 'general/' . $file_name;
                Storage::put($logo_short_white_path, (string) $logo_short_white->encode());
                $model->update(
                    [
                        'logo_short_white' => $logo_short_white_path,
                    ]
                );
            }
            if ($request->file('browser_logo')) {
                Storage::delete($model->browser_logo ?? '');
                $file = $request->file('browser_logo');
                $file_name = Str::slug('browser_logo-' . time()) . "." . $request->file('browser_logo')->getClientOriginalExtension();
                $browser_logo = Image::make($file);
                $browser_logo_path = 'general/' . $file_name;
                Storage::put($browser_logo_path, (string) $browser_logo->encode());
                $model->update(
                    [
                        'browser_logo' => $browser_logo_path,
                    ]
                );
            }

            $response = ['success' => true, 'message' => 'General updated successfully'];
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
