@extends('layouts.app')

@section('content')


        <table class="table" style="margin-top: -50px">
                <thead class="thead-dark">
                <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">price</th>
                        <th scope="col">category</th>
                        <th scope="col">date</th>
                        <th scope="col">image</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Products as $p)
                        <tr>

                                <th>{{$p->id }}</th>

                                <th>{{$p->product_name}}</th>

                                <th>{{$p->price}}</th>
                                <th>{{$p->category}}</th>
                                <th>{{$p->Production_Date}}</th>
                                <th><img src="{{asset('/storage/storage/'.$p->image)}}" width="100px" height="100px"alt="Image"> </th>
                          <form method="get" action="{{ route('product.edit',$p->id) }}" >     <th> <button type="submit" >edit</button></th></form>
                           <form method="post" action="{{route('product.destroy',$p->id)}}" > {{method_field('DELETE')}} @csrf    <th> <button type="submit " >delete</button></th></form>
                                <br>

                        </tr>
                @endforeach


                </tbody>

{{--@foreach($Products as $p)--}}
{{--        <tr>--}}

{{--                <th>{{$p->id }}</th>--}}

{{--                <th>{{$p->product_name}}</th>--}}

{{--                <th>{{$p->price}}</th>--}}
{{--                <th>{{$p->category}}</th>--}}
{{--                <th>{{$p->Production_Date}}</th>--}}
{{--                <th><img src="{{asset('storage/'.$p->image)}}" width="100px" height="100px"alt="Image"> </th>--}}
{{--                <br>--}}

{{--        </tr>--}}
{{--@endforeach--}}





@endsection
