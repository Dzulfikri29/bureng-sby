<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Section;
use App\Models\Training;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $data['pendaftaran'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'kegiatan');
        })
            ->with('images')
            ->where('name', 'pendaftaran')
            ->first();

        return view('registration', $data);
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
            'institution' => 'required|max:100',
            'phone' => 'required:max:20|numeric',
            'address' => 'required|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'activity' => 'required|max:255',
            'description' => 'nullable:max:255',
            'g-recaptcha-response' => 'required|recaptcha',
        ], [], [
            'institution' => 'peserta pelatihan',
            'phone' => 'no telepon',
            'address' => 'alamat',
            'from_date' => 'tanggal mulai',
            'to_date' => 'tanggal selesai',
            'activity' => 'pelatihan',
            'description' => 'keterangan lain',
            'g-recaptcha-response' => 'captcha',
        ]);

        $check_available_date = Training::where(function ($query) use ($request) {
            $query->where(function ($c) use ($request) {
                $c->whereDate('from_date', '<=', Carbon::parse($request->from_date))
                    ->whereDate('to_date', '>=', Carbon::parse($request->from_date));
            })
                ->orWhere(function ($c) use ($request) {
                    $c->whereDate('to_date', '<=', Carbon::parse($request->to_date))
                        ->whereDate('to_date', '>=', Carbon::parse($request->to_date));
                });
        })
            ->where('status', 'approve')
            ->first();

        if ($check_available_date) {
            $response = ['success' => false, 'errors' => ['from_date' => ['Tanggal yang anda pilih sudah terisi, silahkan pilih tanggal lain']]];

            if ($request->ajax()) {
                return response()->json($response, 422);
            }
        }
        try {
            $model = new Training();
            $model->institution = $request->institution;
            $model->phone = $request->phone;
            $model->address = $request->address;
            $model->from_date = $request->from_date;
            $model->to_date = $request->to_date;
            $model->activity = $request->activity;
            $model->description = $request->description ?? '';
            $model->status = 'pending';
            $model->save();

            $response = ['success' => true, 'message' => "Berhasil mendaftar, silahkan tunggu konfirmasi dari kami"];
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
        }
    }
}
