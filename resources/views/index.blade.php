@extends('layouts.app')

@section('content')


        <table class="table" style="margin-top: -50px">
                <thead class="thead-dark">
                <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">price</th>

                        <th scope="col">date</th>
                        <th scope="col">image</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        <th scope="col">user_id</th>
                        <th scope="col">user_name</th>
                        <th scope="col">category_id</th>
                        <th scope="col">category_name</th>

                </tr>
                </thead>
                <body>

                @foreach($Products as $p)
                        <tr>

                                <th>{{$p->id }}</th>
{{--                                <th>{{$W=$P->user_id--}}
{{--                                $results = DB::select('select * from users where id = $w', ['id' => 1]);--}}


{{--                                }} </th>--}}


                                <th>{{$p->product_name}}</th>

                                <th>{{$p->price}}</th>

                                <th>{{$p->Production_Date}}</th>
                                <th><img src="{{asset('/storage/storage/'.$p->image)}}" width="100px" height="100px"alt="Image"> </th>
                          <form method="get" action="{{ route('product.edit',$p->id) }}" >     <th> <button type="submit" >edit</button></th></form>
                           <form method="post" action="{{route('product.destroy',$p->id)}}" > {{method_field('DELETE')}} @csrf    <th> <button type="submit " >delete</button></th></form>
                                <br>
                                <th>{{$p->user_id}}</th>


                                <th>
                                        {{  //  \App\User::find($p->user_id)->name
                                        $p->user->name

                                         }}
                                </th>
                                <th>{{$p->category_id}} </th>

                                <th>
                             @if($p->category_id==null)


@else
                                    {{ \App\Category::find($p->category_id)->name }}

                                 @endif
                                </th>


                        </tr>
                @endforeach


                </body>


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
