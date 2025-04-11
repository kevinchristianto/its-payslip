<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpreadsheetController extends Controller
{
    public function index()
    {
        return view('pages.process.index');
    }
}
