@extends('layouts.app')

@section('content')

<h6>{{$message}} </h6>

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">Message</th>

        </thead>
        <tbody>
        @foreach($n as $nn)
            <tr>

                <th>{{$nn->id }}</th>
                {{--                                <th>{{$W=$P->user_id--}}
                {{--                                $results = DB::select('select * from users where id = $w', ['id' => 1]);--}}


                {{--                                }} </th>--}}


                <th>{{$nn->title}}</th>
                <th>{{$nn->Message}}</th>
</tr>
        @endforeach

        </tbody>
    </table>
@endsection
