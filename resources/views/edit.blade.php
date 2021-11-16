@extends('layouts.app')

@section('content')



    <style>
        .ayousef{


            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem+ 2px);

            padding: 0.375rem 0.75rem;

            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px

            solid #ced4da;
            border-radius: 0.25rem

        ;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>

    <form  method="post" action="{{ route('product.update',$Product->id)  }}" enctype="multipart/form-data" >{{method_field('put')}}
        @csrf
     <div class="col-md-6" >
    <label for="name" class="col-md-4 col-form-label text-md-right "  >product_name</label>


        <input  type="text" class=" form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{$Product->product_name}}">
         @error('product_name')
         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
         @enderror



     </div>

        <div class="col-md-6" >
            <label  class="col-md-4 col-form-label text-md-right">Production Date</label>


            <input  type="date" class="form-control @error('Production_Date') is-invalid @enderror " name="Production_Date" value="{{$Product->Production_Date}}">
            @error('Production_Date')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror



        </div>
     <div class="col-md-6" >
    <label for="name" class="col-md-4 col-form-label text-md-right" >price</label>




        <input  type="text" class="form-control @error('price') is-invalid @enderror " name="price" value="{{$Product->price}}" >

         @error('price')
         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
         @enderror
</div>
 <br>
     <label class="col-md-4" >Choose category:</label>

     <select  name="category"  >
         <option value="food">food</option>
         <option value="clothes">clothes</option>
         <option value="glasses">glasses</option>
         <option value="makeup">
             makeup</option>
     </select>
<br>
<br>

     <div class="col-md-6" >
         <label for="name" class="col-md-4 col-form-label text-md-right">image</label>

      <br>

         <input  type="file"  class=" form-control @error('image') is-invalid @enderror " name="image" value="{{$Product->price}}"   >

         <img src="{{asset('/storage/storage/'.$Product->image)}}" width="100px" height="100px"alt="Image">
         <br>

         @error('image')
         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
         @enderror
         <br>
     </div>

 <br>

     <button type="submit"  class="btn btn-primary">
         update
     </button>
        <h1>edit</h1>
</form>
@endsection
