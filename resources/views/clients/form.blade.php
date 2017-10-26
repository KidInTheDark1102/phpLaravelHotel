@extends('layout.app')

@section('content')
    <div class="row">
        <div class="medium-12 large-12 columns">
            <h4>{{$modify==0 ? 'New Client' : 'Update Client'}}</h4>
            <form action="{{$modify==0 ? route('create_client') : route('update_client',['client_id'=>2]) }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="medium-4  columns">
                <label>Title</label>
                <select name="form[title]">
                @foreach($titles as $t)
                            <option value="{{$t}}">{{$t}}. </option>
                @endforeach
                </select>
            </div>
            <div class="medium-4  columns">
                <label>Name</label>
                <input name="first_name" type="text" value="{{old('first_name')}}" >
                <small class='error'>{{$errors->first('first_name')}}</small>
            </div>
            <div class="medium-4  columns">
                <label>Last Name</label>
                <input name="last_name" type="text">
            </div>
            <div class="medium-8  columns">
                <label>Address</label>
                <input name="address" type="text">
            </div>
            <div class="medium-4  columns">
                <label>zip_code</label>
                <input name="zip_code" type="text">
            </div>
            <div class="medium-4  columns">
                <label>City</label>
                <input name="city" type="text">
            </div>
            <div class="medium-4  columns">
                <label>State</label>
                <input name="state" type="text">
            </div>
            <div class="medium-12  columns">
                <label>Email</label>
                <input name="email" type="text">
            </div>
            <div class="medium-12  columns">
                <input value="SAVE" class="button success hollow" type="submit">
            </div>
            </form>
        </div>
        </div>
@endsection