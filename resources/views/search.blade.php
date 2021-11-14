@extends('layouts.app')

@section('content')





        <form    method="post"  action="{{ url('getsearch') }}"  >
            @csrf

                        <input class="form-control mr-sm-5" name="query"  type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-12 my-sm-4" type="submit">Search</button>

        </form>

@endsection
