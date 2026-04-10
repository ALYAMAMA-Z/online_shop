@extends('layouts.master')
@section('content')

<div class="container mt-5 mb-5" style="text-align:center">


<form action="/storProductImag" method="post" enctype="multipart/form-data">
	@csrf
<div class=""row mb-5 mt-5>

    	<input type="hidden" style="width:100%" name="product_id" id="product_id"  value={{$product->id}}>


<div class="col-9 pt-3">

	<input type="file"class="form-control" class="col-12" name="photo" id="photo"/>

</div>

<div class="col-3">

    <input type="submit" value="Submit" class="col-3"/>

</div>
    <span class="text-danger">
								@error('photo')
									{{$message}}
								@enderror
    </span>
</div>

</form>




    <div class="row">
@foreach($productimag as $item)
<div class="col-4">
<img src="{{ asset($item -> imagpath )}}" class="m-3" width="200" height="200" alt="" />

	<a href="/removeproductphoto/{{$item -> id}}" class="btn btn-danger"><i class="fas fa-trash"></i>  
		حذف المنتج
	</a>
</div>
@endforeach
</div>
</div>
@endsection