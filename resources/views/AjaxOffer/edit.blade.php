@extends('layouts.app')
@section('content')
<div class="alert alert-success" id="msg-sucess" style="display:none;">
   The offer is updated</div>
<form method="Post" id="offerFormUpdate" action="" enctype="multipart/form-data">
    @csrf
    <div class="form-group">

        <input type="text"  style="display:none;"value="{{ $offer->id }}" class="form-control" name="offer_id"  placeholder="name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" value="{{ $offer->name }}" class="form-control" name="name"  placeholder="name">
      @error('name')
      <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Price</label>
      <input type="text" value="{{ $offer->price }}"class="form-control" name="price" placeholder="Price">
      @error('price')
      <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Details</label>
        <input type="text" value="{{ $offer->details }}"class="form-control" name="details" placeholder="Details">
        @error('details')
        <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Photo</label>
        <input type="file" value="{{ $offer->photo }}"class="form-control" name="photo" placeholder="Photo">
        @error('photo')
        <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
        @enderror
      </div>

    <button id="Update_offer" class="btn btn-primary">Submit</button>
  </form>

@endSection
@section('script')
<script>
    $(document).on('click','#Update_offer',function(e){
        e.preventDefault();
     var formData= new FormData($('#offerFormUpdate')[0]);
        $.ajax(
        {
            enctype:'multipart/form-data',
            type: 'post',
            url:"{{ route('Ajax.update') }}",
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            success:function(data){
                if(data.status==true){
                    $('#msg-sucess').show();
                }
            },
            error:function(reject){}
        }
    );
    })

</script>
@stop
