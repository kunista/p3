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
     * SEARCH /school
     */
    public function search()
    {

        return view('school.search')->with([
            'grade' => session('grade')
        ]);
    }

    /**
     *
     */
    public function store(Request $request)
    {
        // $messages = [
        //     'required' => 'Don\'t forget the :attribute field',
        // ];
        #dd($request->all());
        $this->validate($request, [
            'grade' => 'required|numeric|min:0|max:13',
            'schoolTypes' => 'required'

        ]);

        $grade = $request->input('grade');
        #$schoolTypes = $request->input('schoolTypes');

        #return redirect('/book/'.$title);
        return (redirect('/search')->with([
            'grade' => $grade
        ]))->withInput();
    }
}
