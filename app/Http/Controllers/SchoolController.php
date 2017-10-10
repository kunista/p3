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
        return 'Show form to collect info from user...';
    }

    /**
     * GET /school{$title}
     */
    public function search()
    {
        return 'At this step we would search for schools...';
        # redirect...
    }
}
