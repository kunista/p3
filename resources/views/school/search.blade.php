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
            <option value='All'>All</option>
            <option value='East Boston'>East Boston</option>
            <option value='Dorchester'>Dorchester</option>
            <option value='Allston/Brighton'>Allston/Brighton</option>
        </select>

        <div class='form-group'>
            <input type='submit' class='btn btn-primary btn-small' value='Filter schools'>
        </div>

    </form>

@endsection

