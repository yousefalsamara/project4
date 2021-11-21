@extends('layouts.app')

@section('content')


    <label class="col-md-4" >Choose category:</label>
    <select  name="category" >
@foreach($cat as $cats)



        <option  >{{$cats->name}}</option>



@endforeach
    </select>
@endsection
