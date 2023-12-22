@extends('layouts.app');
@section('content')

{{--
<div class="alert alert-success" id="msg-sucess" style="display:none;">
    The offer is deleted</div>
    <div class="alert alert-danger" id="msg-fail" style="display:none;">
        The offer is  not deleted</div>
        <br> --}}

        <table class="table">
            <thead>
              <tr >
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Details</th>
                <th scope="col">Photo</th>

              </tr>
            </thead>
            <tbody>

                @foreach($offers as $offer)
                <tr class="offer_Row{{ $offer->id }}">
                <th scope="row">{{ $offer->id }}</th>
                <td>{{ $offer->name }}</td>
                <td>{{ $offer->price }}</td>
                <td>{{ $offer->details }}</td>
                <td><img style="width:90px ;height:90px ;" src="{{ asset('images/offer/'.$offer->photo) }}" ></td>

                <td><a href="{{ route('Ajax.edit',$offer->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                    <button  offer_id="{{ $offer->id }}" type="button" class="delete-btn btn btn-danger">Delete</button></td>
              </tr>
              @endforeach

            </tbody>
          </table>


@stop
@section('script')

<script>
    $(document).on('click','.delete-btn',function(e){
        e.preventDefault();
       var offer_id= $(this).attr('offer_id');

        $.ajax(
        {
            // enctype:'multipart/form-data',
            type: 'post',
            url:"{{ route('Ajax.delete') }}",
            data:{
                '_token':"{{ csrf_token() }}",
                'id':offer_id,

            },

            success:function(data){
                if(data.status==true){
                    $('#msg-sucess').show();
                }
                $('.offer_Row'+data.id).remove();
            },
            error:function(reject){
                if(data.status==false){
                    $('#msg-fail').show();
                }
            }
        }
    );
    })

</script>
@stop
