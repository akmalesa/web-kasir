<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SejarahApkController extends Controller
{
    public function index(){
        return view('sejarahapk.index');
    }
}
