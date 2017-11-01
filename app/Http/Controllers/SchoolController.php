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
            'grade' => session('grade'),
            'schoolTypes' => session('schoolTypes'),
            'neighborhood' => session('neighborhood'),
            'searchResults' => session('searchResults')
        ]);
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'grade' => 'required|numeric|min:0|max:13',
            'neighborhood' => 'required',
            'schoolTypes' => 'required',
        ]);
        $grade = $request->input('grade');
        $schoolTypes = $request->input('schoolTypes');
        $neighborhood = $request->input('neighborhood');
        $searchResults = [];
        $schoolsRawData = file_get_contents(database_path('/schools.json'));
        $schools = json_decode($schoolsRawData, true);
        foreach ($schools as $name => $school) {
            if ((($school['gradeFloor']<=$grade) AND ($school['gradeCeiling']>=$grade)) AND (in_array($school['type'],$schoolTypes)) AND ($school['neighborhood'] == $neighborhood)) {
                $searchResults[$name] = $school;
            }
        }
        return (redirect('/search')->with([
            'grade' => $grade,
            'schoolTypes' => $schoolTypes,
            'neighborhood' => $neighborhood,
            'searchResults' => $searchResults
        ]))->withInput();
    }
}
