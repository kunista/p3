@extends('layouts.master')


@section('title')
    School match tool
@endsection

@section('content')
    <h1>School Match Tool</h1>

    <form method='POST' action='/school'>

        {{ csrf_field() }}

        <div class='form-group'>
            <label for='grade'>Select Grade (required):</label>
            <input type='text' name='grade' id='grade' value='{{ old('grade') }}'>
            @include('modules.error-field', ['fieldName' => 'grade'])
            <br></br>
        </div>

        <fieldset class='checkboxes'>
            <label>Select school type:</label>
            <br>
            <label><input type='checkbox' name='schoolTypes[]' value='Catholic' {{ (old('schoolTypes') and in_array('Catholic', old('schoolTypes'))) ? 'checked' : ''}}> Catholic</label>
            <label><input type='checkbox' name='schoolTypes[]' value='Public' {{ (old('schoolTypes') and in_array('Public', old('schoolTypes'))) ? 'checked' : ''}}> Public</label>
            <label><input type='checkbox' name='schoolTypes[]' value='Private' {{ (old('schoolTypes') and in_array('Private', old('schoolTypes'))) ? 'checked' : ''}}> Private</label>
            @include('modules.error-field', ['fieldName' => 'schoolTypes'])
        </fieldset>

        <label for='neighborhood'>Select neighborhood</label>
        <select name='neighborhood' id='neighborhood'>
            <option value=''>Choose one...</option>
            <option value='East Boston' {{ (old('neighborhood')=='East Boston') ? 'SELECTED' : ''}} >East Boston</option>
            <option value='Dorchester' {{ (old('neighborhood')=='Dorchester') ? 'SELECTED' : ''}} >Dorchester</option>
            <option value='Allston/Brighton' {{ (old('neighborhood')=='Allston/Brighton') ? 'SELECTED' : ''}} >Allston/Brighton</option>
        </select>
        @include('modules.error-field', ['fieldName' => 'neighborhood'])

        <div class='form-group'>
            <input type='submit' class='btn btn-primary btn-small' value='Filter schools'>
        </div>



    </form>

    @if($grade != null AND $schoolTypes!= null AND $neighborhood!= null)
        <div class='alert alert-info'>You searched for schools with grade: <strong> {{ $grade }} </strong></div>
        <div class='alert alert-info'>You searched for schools with type: <strong> {{ implode(", ",$schoolTypes) }} </strong></div>
        <div class='alert alert-info'>You searched for schools with neighborhood: <strong> {{ $neighborhood }} </strong></div>

        <h2>Results for your search query: </h2>

        @if(count($searchResults) == 0)
            No matches found.
        @else
            @foreach($searchResults as $name => $school)
                <div class='school'>
                    <h2> {{$name}}</h2>
                    <ul>
                        <li>Type: {{$school['type']}}</li>
                        <li>Grade: {{$school['gradeFloor']." - ".$school['gradeCeiling']}}</li>
                        <li>Neighborhood: {{$school['neighborhood']}}</li>
                    </ul>
                </div>
            @endforeach
        @endif
    @endif



@endsection

