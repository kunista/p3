<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * GET /schools
     */
    public function index()
    {
        return view('school.index');
    }

    /**
     * GET /school{$title}
     */
    public function search()
    {
        return view('school.search');
    }
}
