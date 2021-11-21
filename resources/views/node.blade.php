@extends('layouts.app')

@section('content')

    @if($errors->any())
        <div class="alert alert-success">
            {{$errors->first()}}
        </div>
    @endif
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">add node</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formname" method="post" action="{{ route('noderesource.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">title</label>
                            <input type="text" class="form-control" id="node-name" name="title">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text" name="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                </div>
            </div>
        </div>
    </div>


    <table class="table table-dark "  id="tabelid">
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


        <script>
            $("#formname").submit(function (e) {
                e.preventDefault();
                let title=$("#node-name").val();
                let Message=$("#message-text").val();


                $.ajax({
                    url:"{{ route('noderesource.store') }}",
                    type:"post",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        title:title,
                        Message:Message,
                    },
 success:function (response) {
                         if(response){
            $("#tabelid").append("<tr><th>"+response.id+"</th><th>"+response.title+ "</th><th>" +response.Message+"</th></tr>");
            $("#formname")[0].reset();
            $("#exampleModal").modal('hide');




                         }

 }
                    }

                )

            });

        </script>



        </tbody>
    </table>

@endsection
