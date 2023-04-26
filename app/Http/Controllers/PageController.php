<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Structure;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function profile()
    {
        $data['header'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'profil');
        })
            ->with('images')
            ->where('name', 'header')
            ->first();

        $data['section_1'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'profil');
        })
            ->with('images')
            ->where('name', 'bagian-1')
            ->first();
        $data['section_2'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'profil');
        })
            ->with('images')
            ->where('name', 'bagian-2')
            ->first();

        return view('profile', $data);
    }

    public function structure()
    {
        $data['section_1'] = Section::whereHas('page', function ($query) {
            $query->where('name', 'struktur');
        })
            ->with('images')
            ->where('name', 'bagian-1')
            ->first();

        $data['structures'] = Structure::orderBy('structure_id')
            ->get();
        return view('structure', $data);
    }

    public function activity()
    {
        return view('activity');
    }

    public function product()
    {
        return view('product');
    }

    public function blog()
    {
        return view('blog');
    }
}
