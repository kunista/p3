@extends('layouts.master')


@section('title')
    School match tool
@endsection

@section('content')
    <h1>School Match Tool</h1>

    <form>


        <div class='form-group'>
            <label for='grade'>Select Grade (required):</label>
            <input type='number' name='grade' min="1" max="12" id='grade'>
            <br></br>
        </div>

        <fieldset class='checkboxes'>
            <label>Select school type:</label>
            <br>
            <label><input type='checkbox' name='schoolTypes[]' value='Catholic'> Catholic</label>
            <label><input type='checkbox' name='schoolTypes[]' value='Public'> Public</label>
            <label><input type='checkbox' name='schoolTypes[]' value='Private'> Private</label>
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

