<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $title = 'Jurusan';
        return view('jurusan',compact('title'));
    }
}
