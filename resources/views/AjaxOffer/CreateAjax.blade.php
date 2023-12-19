@extends('layouts.app')
@section('content')
<form method="" action="" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" name="name"  placeholder="name">
      @error('name')
      <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Price</label>
      <input type="text" class="form-control" name="price" placeholder="Price">
      @error('price')
      <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Details</label>
        <input type="text" class="form-control" name="details" placeholder="Details">
        @error('details')
        <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Photo</label>
        <input type="file" class="form-control" name="photo" placeholder="Photo">
        @error('photo')
        <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
        @enderror
      </div>

    <button id="save_offer" class="btn btn-primary">Submit</button>
  </form>

@endSection
@section('script')
<script>
    $(document).on('click','#save_offer',function(e){
        e.preventDefault();

        $.ajax(
        {
            type: 'post',
            url:"{{ route('Ajax.store') }}",
            data:{
                '_token':'{{ csrf_token() }}',
                'name':$("input[name='name']").val(),
                'price':$("input[name='price']").val(),
                'details':$("input[name='details']").val(),

            },
            success:function(data){},
            error:function(reject){}
        }
    );
    })

</script>
@stop
